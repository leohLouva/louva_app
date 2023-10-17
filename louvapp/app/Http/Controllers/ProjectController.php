<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;

class ProjectController extends Controller
{
        //ver lista de usuarios
        public function index()
        {
            //$project = Project::all(); 
            $project = DB::table('projects')
            ->leftjoin('progress_projects', 'projects.progress', '=', 'progress_projects.idProgress')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
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
            $getProgress = DB::table('progress_projects')
                ->get();

            return view('proyectos/agregar-proyecto', [
                'states' => $getStates,
                'owners' => $getOwner,
                'reponsables' => $getResponsable,
                'progresss' => $getProgress
            ]);
            
        }

        public function store(Request $request)
        {

            $fechaInicio = date('Y-m-d', strtotime($request->fechaInicio));

            
            $project = new Project([
                'projectImage' => $request->flImage,
                'projectName' => $request->nombre,
                'telefono' => $request->telefono,
                'description' => $request->descripcion,
                'progress' => $request->porcentaje,
                'fechaInicio' => $fechaInicio,
                'squareMeterSuperficial' => $request->mtsSuperficiales,
                'squareMeterSotano' => $request->mtsSotano,
                'projectType' => $request->tipoProyecto,
                'address' => $request->direccion,
                'location' => $request->locacion,
                'state' => $request->estado,
                'constructionSystem' => $request->sistemaConstruccion,
                'idUser_projectManager' => $request->desarrollador,
                'idUser_workManager' => $request->responsableObra,
                'totalScheduledCost' => $request->totalCosto
            ]);
            
            $project->save();
            return redirect()->route('editar-proyecto.show', ['id' => $project->id])->with('success', 'Proyecto agregado correctamente.');
            
        }

        public function show($id){

            $project = DB::table('projects')
            ->leftjoin('estados', 'projects.state', '=', 'estados.idEstado')
            ->leftjoin('municipios', 'projects.location', '=', 'municipios.idMunicipio')
            ->where('projects.id', $id)
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

            return view('proyectos/editar-proyecto', [
                'states' => $getStates,
                'owners' => $getOwner,
                'reponsables' => $getResponsable,
                'progresss' => $getProgress,
                'projects' => $project
            ]);
            

        }

        public function update(Request $request, $idProject){
            $oProject = new Project();
            $oProject = Project::findOrFail($idProject);
            
            /*$request->validate([
                'flImage' => 'required', // Ejemplo de regla de validación
                'nombre' => 'required|string',
                'telefono' => 'required|string',
                'descripcion' => 'required|string',
                'porcentaje' => 'required|numeric',
                'fechaInicio' => 'required|date',
                'mtsSuperficiales' => 'required|numeric',
                'mtsSotano' => 'required|numeric',
                'tipoProyecto' => 'required|string',
                'direccion' => 'required|string',
                'locacion' => 'required|integer',
                'estado' => 'required|integer',
                'sistemaConstruccion' => 'required|string',
                'desarrollador' => 'required|integer',
                'responsableObra' => 'required|integer',
                'totalCosto' => 'required|numeric',
            ]);
            */
            
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
            

            //$oProject->toSql;
                return redirect()->route('editar-proyecto.show', ['id' => $oProject->id])->with('success', 'Proyecto editado correctamente.');
            
        }

        public function createDirecrotory($request)
        {
            dd($request->all());
            $path = public_path('upload/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);

        // retry storing the file in newly created path.
            }   
        }
        
    
        
}
