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

        public function store(Request $request)
        {
            // Guardar el pryecto en la base de datos
            $project = new Project([
                    'projectName' => $request->name,
                    'description' => $request->description,
                    'progress' => 1,
                    'img_logo' => $request->flImage,
                    'fechaInicio' => date('Y/m/d', strtotime($request->fechaInicio)),
                    'urlPowerBi' => null
            ]);
            $project->save();
            return redirect()->route('proyectos/editar-proyecto.show', ['id' => $project->id])->with('success', 'Proyecto agregado correctamente.');
            

    
        }

        public function show($id){
            $project = Project::find($id);
            return view('proyectos/editar-proyecto', ['projects' => $project]);

        }

        public function update(Project $project, Request $request){
            $project->update([
                'projectName' => $request->txtName,
                'description' => $request->txtLastName,
                'progress' => $request->txtUserName,
                'img_profile' => $request->flImage,
                'updated_at' => now()
            ]);
            
            return redirect()->route('editar-usuario.show', ['id' => $project->id])->with('success', 'Proyecto editado correctamente.');
    
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
