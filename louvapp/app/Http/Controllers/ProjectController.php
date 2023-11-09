<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Project;
use App\Models\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use App\ProyectoEmpresa;
use App\Attendence;

class ProjectController extends Controller
{
        //ver lista de usuarios
        public function index()
        {
            //$project = Project::all(); 
            $project = DB::table('projects')
            ->orderBy('created_at', 'desc')
            ->get();
            return view('proyectos/lista-proyectos', ['projects' => $project]);
        }

        public function verAgregarProyecto()
        {
            $getStates = DB::table('estados')->get();
            $getOwner = DB::table('users')
                ->join('workers', 'workers.idUser_worker', '=', 'users.id')
                ->where('users.idType_user_type', '=', 4)
                ->get();
            $getResponsable = DB::table('users')
                ->join('workers', 'workers.idUser_worker', '=', 'users.id')
                ->where('users.idType_user_type', '=', 2)
                ->get();
            $getProjectType = DB::table('project_type')
                ->get();
            
            $getSystemConst = DB::table('construction_system')
                ->get();

            return view('proyectos/agregar-proyecto', [
                'states' => $getStates,
                'owners' => $getOwner,
                'reponsables' => $getResponsable,
                'project_types' => $getProjectType,
                'systemConsts' => $getSystemConst
            ]);
            
        }

        public function store(Request $request)
        {

        try{
            
            $fechaInicio = date('Y-m-d', strtotime($request->fechaInicio));
            $project = new Project([
                'projectName' => $request->nombre,
                'projectImage' => $request->flImage,
                'description' => $request->descripcion,
                'fechaInicio' => $fechaInicio,
                'squareMeterSuperficial' => $request->mtsSuperficiales,
                'squareMeterSotano' => $request->mtsSotano,
                'projectType' => $request->tipoProyecto,
                'address' => $request->direccion,
                'location' => $request->location,
                'state' => $request->estado,
                'constructionSystem' => $request->sistemaConstruccion,
                'idUser_projectManager' => $request->desarrollador,
                'idUser_workManager' => $request->responsableObra,
                'totalScheduledCost' => $request->totalCosto
            ]);
            

            $project->save();
            
            return redirect()->route('editar-proyecto.show', ['id' => $project->idProject])->with('success', 'Proyecto agregado correctamente.');

            /*return response()->json([
                //'redirect' => route('proyectos/editar-proyecto.show', ['idProject' => $project->idProject]),
                'status' => '0',
                'message' => 'EL PROYECTO SE AGREGÓ CORRECTAMENTE'
            ]);*/

        } catch (\Exception $e) {
           //dd("hay un error en el insert " . $e); 
           return response()->json([
                //'redirect' => null,
                'status' => '1',
                'message' => 'ERROR: ' . $e
            ]);

        }
            
        }

        public function show($id){

            $project = DB::table('projects')
                ->leftjoin('estados', 'projects.state', '=', 'estados.idEstado')
                ->leftjoin('municipios', 'projects.location', '=', 'municipios.idMunicipio')
                ->where('projects.idProject', $id)
                ->first();
            
            $getStates = DB::table('estados')->get();
                
            $getOwner = DB::table('users')
                ->join('workers', 'workers.idUser_worker', '=', 'users.id')
                ->where('users.idType_user_type', '=', 4)
                ->get();
             
            $getResponsable = DB::table('users')
                ->join('workers', 'workers.idUser_worker', '=', 'users.id')
                ->where('users.idType_user_type', '=', 2)
                ->get();

            $getProgress = DB::table('progress_projects')
                ->get();

            $attendences = DB::table('attendences')
                ->join('workers', 'attendences.idUser_worker', '=', 'workers.idWorker')
                ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
                ->join('contractors', 'attendences.idContractor_contractors', '=', 'contractors.idContractor')
                ->distinct()
                ->where('attendences.idProject_project', $id)
                ->orderBy('attendences.date', 'desc')
                ->get();
            
            $getProjectType = DB::table('project_type')
                ->get();
            
            $getSystemConst = DB::table('construction_system')
                ->get();

            return view('proyectos/editar-proyecto', [
                'states' => $getStates,
                'owners' => $getOwner,
                'reponsables' => $getResponsable,
                'progresss' => $getProgress,
                'projects' => $project,
                'attendences' => $attendences,
                'project_types' => $getProjectType,
                'systemConsts' => $getSystemConst
            ]);
            

        }

        public function update(Request $request, $idProject){

            $oProject = new Project();
            $oProject = Project::findOrFail($idProject);
            
            $oProject->update([
                'projectImage' => $request->flImage,
                'projectName' => $request->nombre,
                'telefono' => $request->telefono,
                'description' => $request->descripcion,
                'progress' => $request->porcentaje,
                'squareMeterSuperficial' => $request->mtsSuperficiales,
                'squareMeterSotano' => $request->mtsSotano,
                'projectType' => $request->tipoProyecto,
                'address' => $request->direccion,
                'location' => $request->municipio,
                'state' => $request->estado,
                'constructionSystem' => $request->sistemaConstruccion,
                'idUser_projectManager' => $request->desarrollador,
                'idUser_workManager' => $request->responsableObra,
                'totalScheduledCost' => $request->totalCosto,
                'updated_at' => now()
            ]);
            
            return redirect()->route('editar-proyecto.show', ['id' => $oProject->idProject])->with('success', 'Proyecto editado correctamente.');
            
        }

       
        
        public function showSelectionForm()
        {
            $contractors = DB::table('contractors')
            ->join('proyecto_empresa', 'contractors.idContractor', '=', 'proyecto_empresa.idContractor_project')
            ->get();

            
            return view('select_project', ['contractors' => $contractors]);
        }
        
        public function showContractors(Request $request)
        {
            
            $empresa = Contractor::join('proyecto_empresa', 'contractors.idContractor', '=', 'proyecto_empresa.idContractor_project')
            ->where('contractors.idContractor', $request->idEmpresa)
            ->first();

            $dateToSearch = "2023-10-24"; // La fecha que deseas buscar

            $getWorkersbyDay = DB::table('attendences')
                ->join('workers', 'workers.idWorker', '=', 'attendences.idUser_worker')
                ->join('proyecto_empresa', 'proyecto_empresa.idProyecto', '=' , 'attendences.idProject_project')
                ->where('date', $dateToSearch)
                ->where('proyecto_empresa.idContractor_project', $request->idEmpresa)
                ->get();    
            dd($getWorkersbyDay);
            return response()->json([
                'empresa' => $empresa,
                'registro' => $getWorkersbyDay
            ]);

        }
        
        public function graphicByProjects(Request $request)
        {   

            $fechaOriginal = $request->fechaRegistro;
            $timestamp = strtotime($fechaOriginal);
            $fechaFormateada = date("Y-m-d", $timestamp);

            $getWorkersbyDay = DB::table('attendences')
                ->select('attendences.idContractor_contractors', 'c.contractorName AS empresa','ft_programado_empresa_proyectos.ft_programado', DB::raw('COUNT(*) as cuenta_checkin'))
                ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor',)
                ->join('workers', 'workers.idWorker', '=', 'attendences.idUser_worker')
                ->join('jobs', 'jobs.idJob', '=', 'workers.idJob_jobs')
                //->join('ft_programado_empresa_proyectos', 'attendences.idProject_project', '=', 'ft_programado_empresa_proyectos.idProject_FT_projects')
                ->join('ft_programado_empresa_proyectos', function ($join) {
                    $join->on('attendences.idProject_project', '=', 'ft_programado_empresa_proyectos.idProject_FT_projects')
                         ->on('attendences.idContractor_contractors', '=', 'ft_programado_empresa_proyectos.idContractor_FT_contractors');
                })
                ->where('date', $fechaFormateada)
                ->where('attendences.idProject_project', $request->idProyecto)
                ->groupBy('attendences.idContractor_contractors', 'c.contractorName','ft_programado_empresa_proyectos.ft_programado')
                ->get();
                
            $totalCuentaCheckin = 0;

            foreach ($getWorkersbyDay as $row) {
                $totalCuentaCheckin += $row->cuenta_checkin;
            }


            return response()->json([
                'registro' => $getWorkersbyDay,
                'cuenta'=> $totalCuentaCheckin
            ]);
            //return response()->json($empresa);
        }

        
        public function indexC()
        {
    
            $jobs = DB::table('projects')->get();
            
            return view('fuerza-trabajo/reporte-trabajadores-puestos', [
                'jobs' => $jobs
            ]);
    
    
        }
        public function graphicByJobs(Request $request)
        {   
            
            $dateToSearchAntes = $request->fechaRegistro;
            $timestamp = strtotime($dateToSearchAntes);
            $dateToSearch = date("Y-m-d", $timestamp);

            /*$getWorkersbyDay = DB::table('attendences')
                ->select('attendences.idContractor_contractors', 'c.contractorName AS empresa', DB::raw('COUNT(*) as cuenta_checkin'))
                ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor')
                ->join('workers', 'workers.idWorker', '=', 'attendences.idUser_worker')
                ->join('jobs', 'jobs.idJob', '=', 'workers.idJob_jobs')
                ->where('date', $dateToSearch)
                ->where('attendences.idProject_project', $request->idProyecto)
                ->groupBy('attendences.idContractor_contractors', 'c.contractorName')
                ->get();*/
                $getGobsByDay = DB::table('attendences')
                ->select(
                    'attendences.idContractor_contractors',
                    'c.contractorName AS empresa',
                    'j.jobName AS puesto', // Agregar el campo 'jobName' de la tabla 'jobs'
                    DB::raw('COUNT(*) as cuenta_checkin')
                )
                ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor')
                ->join('workers', 'workers.idWorker', '=', 'attendences.idUser_worker')
                ->join('jobs as j', 'j.idJob', '=', 'workers.idJob_jobs')
                ->where('date', $dateToSearch)
                ->where('attendences.idProject_project', $request->idProyecto)
                ->groupBy('attendences.idContractor_contractors', 'c.contractorName', 'j.jobName') // Agrupar también por el puesto
                ->get();

            $totalCuentaCheckin = 0;

            foreach ($getGobsByDay as $row) {
                $totalCuentaCheckin += $row->cuenta_checkin;
            }

            return response()->json([
                'registro' => $getGobsByDay,
                'cuenta'=> $totalCuentaCheckin
            ]);

        }

}
