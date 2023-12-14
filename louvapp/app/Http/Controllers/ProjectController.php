<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Project;
use App\Models\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use App\ProyectoEmpresa;
use App\Attendence;
use Intervention\Image\Facades\Image;
use DateTime;


class ProjectController extends Controller
{
        //ver lista de usuarios
        public function index()
        {
            $perPage = 10;
            $projects = DB::table('projects')
                ->join('estados', 'projects.state', '=', 'estados.idEstado')
                ->join('municipios', 'projects.location', '=', 'municipios.idMunicipio')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);

            return view('obras/lista-obras', ['projects' => $projects]);
        }

        public function verAgregarProyecto()
        {
            $getStates = DB::table('estados')->get();

            $getOwner = DB::table('users')
                ->where('users.idType_user_type', '=', 4)
                ->get();

            $getResponsable = DB::table('users')
                ->where('users.idType_user_type', '=', 2)
                ->get();
            $getProjectType = DB::table('project_type')
                ->get();
            
            $getSystemConst = DB::table('construction_system')
                ->get();

            return view('obras/agregar-obra', [
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
            
            return redirect()->route('editar-obra.show', ['id' => $project->idProject])->with('success', 'Proyecto agregado correctamente.');

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

        public function storeProject(Request $request)
        {
            try{
                $imageFile = $request->file('file');
                $imageName = Str::uuid() . "." . $imageFile->extension();
                $imageServer = Image::make($imageFile);
                $imageServer->fit(1000,1000);

                $imagePath = public_path('uploads/obras') . '/' . $imageName;
                $imageServer->save($imagePath);
                return response()->json([
                    'status' => '1',
                    'message' => 'Imágen almacenada con éxito',
                    'imagen' => $imageName,
                    'redirect' => '0'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'Error',
                    'message' => $e->getMessage()
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
             
            $getMunicipio = DB::table('municipios')
            ->join('estados_municipios', 'estados_municipios.municipios_id', '=', 'municipios.idMunicipio')
            ->where('estados_municipios.estados_id', '=', $project->state)
            ->get();
             
            $getOwner = DB::table('users')
                ->where('users.idType_user_type', '=', 4)
                ->get();
             
            $getResponsable = DB::table('users')
                ->where('users.idType_user_type', '=', 2)
                ->get();

            $getContractorsActives = DB::table('proyecto_empresa')
            ->join('contractors', 'proyecto_empresa.idContractor_project', '=', 'contractors.idContractor')
            ->where('proyecto_empresa.idProyecto', '=', $id)
            ->get();

            $attendences = DB::table('attendences')
                ->join('users', 'attendences.idUser_worker', '=', 'users.idUser')
                ->join('jobs', 'users.idJob_jobs', '=', 'jobs.idJob')
                ->join('contractors', 'attendences.idContractor_contractors', '=', 'contractors.idContractor')
                ->distinct()
                ->where('attendences.idProject_project', $id)
                ->orderBy('attendences.date', 'desc')
                ->get();
            
            $getProjectType = DB::table('project_type')
                ->get();
            
            $getSystemConst = DB::table('construction_system')
                ->get();

            return view('obras/editar-obra', [
                'states' => $getStates,
                'locations' => $getMunicipio,
                'owners' => $getOwner,
                'reponsables' => $getResponsable,
                'projects' => $project,
                'attendences' => $attendences,
                'project_types' => $getProjectType,
                'systemConsts' => $getSystemConst,
                'contractorActives' => $getContractorsActives
            ]);
            

        }

        public function validarFormatoFecha($fecha, $formato = 'Y-m-d') {
            $dateTime = DateTime::createFromFormat($formato, $fecha);
            return $dateTime && $dateTime->format($formato) == $fecha;
        }
        
        function validarFecha($fecha) {
            $formatoEsperado = 'Y-m-d';
        
            echo $dateTime = DateTime::createFromFormat($formatoEsperado, $fecha);
        
            if ($dateTime && $dateTime->format($formatoEsperado) === $fecha) {
                return true; // La fecha es válida y tiene el formato correcto
            } else {
                echo "aqui";
                return false; // La fecha no es válida o no tiene el formato correcto
            }
        }
        public function update(Request $request, $idProject){

            $fechaInicio = '12-Oct-2023';
            $fechaInicio = DateTime::createFromFormat('d-M-Y', $fechaInicio);

            if ($fechaInicio) {
                $fechaInicio = $fechaInicio->format('Y-m-d');
                
                // Ahora $fechaInicio tiene el formato 'Y-m-d' y puedes usarlo en tu inserción Eloquent.
                
                
            } else {
                // Manejar el caso en que la conversión de la fecha no fue exitosa.
                // Puedes lanzar una excepción, devolver un mensaje de error, etc.
                echo "Error al convertir la fecha.";
            }
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
                'fechaInicio' => $fechaInicio,
                'address' => $request->direccion,
                'location' => $request->location,
                'state' => $request->estado,
                'constructionSystem' => $request->sistemaConstruccion,
                'idUser_projectManager' => $request->desarrollador,
                'idUser_workManager' => $request->responsableObra,
                'totalScheduledCost' => $request->totalCosto,
                'updated_at' => now()
            ]);
            
            return redirect()->route('editar-obra.show', ['id' => $oProject->idProject])->with('success', 'Proyecto editado correctamente.');
            
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

            $dateToSearch = "2023-10-24"; 

            $getWorkersbyDay = DB::table('attendences')
                ->join('users', 'users.idUser', '=', 'attendences.idUser_worker')
                ->join('proyecto_empresa', 'proyecto_empresa.idProyecto', '=' , 'attendences.idProject_project')
                ->where('date', $dateToSearch)
                ->where('proyecto_empresa.idContractor_project', $request->idEmpresa)
                ->get();    
            
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
                ->select('attendences.idContractor_contractors','attendences.date', 'c.contractorName AS empresa','ft_programado_empresa_proyectos.ft_programado', DB::raw('COUNT(*) as cuenta_checkin'))
                ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor',)
                ->join('users', 'users.idUser', '=', 'attendences.idUser_worker')
                ->join('jobs', 'jobs.idJob', '=', 'users.idJob_jobs')
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
            //dd($totalCuentaCheckin);

            return response()->json([
                'registro' => $getWorkersbyDay,
                'cuenta'=> $totalCuentaCheckin
            ]);
            //return response()->json($empresa);
        }

        public function graphicByProjectsNew(Request $request)
        {      

            $fechaInicioSinFormato = $request->fechaInicio;
            $timestampInicio = strtotime($fechaInicioSinFormato);

            $fechaFinSinFormato = $request->fechaFin;
            $timestampFin = strtotime($fechaFinSinFormato);

            //estas son la fechas formateadas para la consulta
            $fechaInicio = date("Y-m-d", $timestampInicio);
            $fechaFin = date("Y-m-d", $timestampFin);

            $getWorkersbyDay = DB::table('attendences')
                ->select(
                    'c.contractorName AS empresa',
                    'j.jobName AS puesto',
                    DB::raw('COUNT(*) as checkin_trabajadores'),
                    'attendences.date',
                    DB::raw('DAYNAME(attendences.date) as day_name'),
                    'p.ft_programado',
                )
                    ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor')
                    ->join('users', 'users.idUser', '=', 'attendences.idUser_worker')
                    ->join('jobs as j', 'j.idJob', '=', 'users.idJob_jobs')
                    ->join('ft_programado_empresa_proyectos as p', 'p.idContractor_FT_contractors', '=', 'attendences.idContractor_contractors')
                    //->where('date', $fechaFormateada)
                    ->where('attendences.idProject_project', $request->idProyecto)
                    ->whereBetween('attendences.date', [$fechaInicio, $fechaFin])
                    ->groupBy('c.contractorName', 'j.jobName','attendences.date','p.ft_programado')
                    ->get();
                    


                    $getWorkersHistoric = DB::table('attendences')
                        ->select(
                            DB::raw('COUNT(*) as total_checkins'),
                            'attendences.date'
                            )
                        ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor')
                        ->join('users', 'users.idUser', '=', 'attendences.idUser_worker')
                        ->join('jobs as j', 'j.idJob', '=', 'users.idJob_jobs')
                        ->where('attendences.idProject_project', $request->idProyecto)
                        ->where('attendences.date', '>=', '2019-01-01') 
                        ->groupBy('attendences.date')
                        ->get();
                

            $empresasConPuestos = [];

            foreach ($getWorkersbyDay as $row) {
                $empresa = $row->empresa;
                $puesto = $row->puesto;
                $cuentaCheckin = $row->checkin_trabajadores;
                $day = $row->day_name;
                $fecha = $row->date;
                
                // Verificamos si la empresa ya está en el arreglo
                if (!isset($empresasConPuestos[$empresa])) {
                    $empresasConPuestos[$empresa] = [];
                }
            
                // Agregamos el puesto y la cuenta de check-in para la empresa
                $empresasConPuestos[$empresa][] = [
                    'puesto' => $puesto,
                    'cuenta_checkin' => $cuentaCheckin,
                    'fecha' => $fecha,
                    'empresas'=> $row->empresa
                ];
                
            }
           
            $puestos = [];

            foreach ($getWorkersbyDay as $row) {
                $puesto = $row->puesto;
                $cuentaCheckin = $row->checkin_trabajadores;
            
                // Verificamos si el puesto ya está en el array
                $index = array_search($puesto, array_column($puestos, 'puesto'));
            
                if ($index !== false) {
                    // Si el puesto ya está en el array, sumamos la cuenta de check-ins
                    $puestos[$index]['cuenta_checkin'] += $cuentaCheckin;
                } else {
                    // Si el puesto no está en el array, lo agregamos con la cuenta de check-ins
                    $puestos[] = [
                        'puesto' => $puesto,
                        'cuenta_checkin' => $cuentaCheckin,
                    ];
                }
            }
            $totalCuentaCheckin = 0;

            foreach ($getWorkersbyDay as $row) {
                $totalCuentaCheckin += $row->checkin_trabajadores;
            }

            // Ahora $series contiene las series que necesitas

            return response()->json([
                'registro' => $getWorkersbyDay,
                'cuenta'=> $totalCuentaCheckin,
                'categorias' => $categories = array_keys($empresasConPuestos),
                'puestos' => $puestos,
                'historico' => $getWorkersHistoric,
                'fechaInicio' => $request->fechaInicio,
                'fechaFin' => $request->fechaFin
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

                $getGobsByDay = DB::table('attendences')
                ->select(
                    'attendences.idContractor_contractors',
                    'c.contractorName AS empresa',
                    'j.jobName AS puesto', // Agregar el campo 'jobName' de la tabla 'jobs'
                    DB::raw('COUNT(*) as cuenta_checkin')
                )
                ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor')
                ->join('users', 'users.idUser', '=', 'attendences.idUser_worker')
                ->join('jobs as j', 'j.idJob', '=', 'users.idJob_jobs')
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

        public function buscarProyectos(Request $request)
        {
            $buscar = $request->input('q');

            $projects = Project::join('estados', 'projects.state', '=', 'estados.idEstado')
            ->join('municipios', 'projects.location', '=', 'municipios.idMunicipio')
            ->join('project_type', 'projects.projectType', '=', 'project_type.idProject_type')
            ->join('construction_system', 'projects.constructionSystem', '=', 'construction_system.idConstruction_system')
            ->where('projectName', 'LIKE', "%$buscar%")
            ->orWhere('construction_system.nameConstruction_system', 'LIKE', "%$buscar%")
            ->orWhere('project_type.nameProject_type', 'LIKE', "%$buscar%")
            ->orWhere('estados.estado', 'LIKE', "%$buscar%")
            ->orWhere('municipios.municipio', 'LIKE', "%$buscar%")
            ->paginate(10);

            return view('obras/lista-obras', ['projects' => $projects]);

            /*return response()->json([
                'status' => '1',
                'message' => 'BUSQUEDA',
                'projects' => $projects,
                //'redirect' =>  view('obras/lista-obras', ['projects' => $projects]),
                'redirect' => route('proyectos.buscar'),
            ]);*/
        }


}
/* ->select('attendences.idContractor_contractors','attendences.date','c.contractorName AS empresa','ft_programado_empresa_proyectos.ft_programado', DB::raw('COUNT(*) as checkin_trabajadores'))
                ->join('contractors AS c', 'attendences.idContractor_contractors', '=', 'c.idContractor',)
                ->join('users', 'users.idUser', '=', 'attendences.idUser_worker')
                ->join('jobs', 'jobs.idJob', '=', 'users.idJob_jobs')
                //->join('ft_programado_empresa_proyectos', 'attendences.idProject_project', '=', 'ft_programado_empresa_proyectos.idProject_FT_projects')
                ->join('ft_programado_empresa_proyectos', function ($join) {
                    $join->on('attendences.idProject_project', '=', 'ft_programado_empresa_proyectos.idProject_FT_projects')
                         ->on('attendences.idContractor_contractors', '=', 'ft_programado_empresa_proyectos.idContractor_FT_contractors');
                })
                //->whereBetween('attendences.date', [$startDate, $endDate])
                ->where('date', $fechaFormateada)
                ->where('attendences.idProject_project', $request->idProyecto)
                ->groupBy('attendences.idContractor_contractors','attendences.date', 'c.contractorName','ft_programado_empresa_proyectos.ft_programado')
                ->get();*/