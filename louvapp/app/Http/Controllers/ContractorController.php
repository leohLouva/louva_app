<?php

namespace App\Http\Controllers;

use Exception;
use DataTables;
use App\Models\User;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ContractorController extends Controller
{
    //
    public function index()
        {
            //$project = Project::all(); 
            $contractor = DB::table('contractors')
            ->leftjoin('projects', 'projects.id', '=', 'contractors.idProject_project')
            ->get();
            return view('contratistas/lista-contratista', ['contractors' => $contractor]);
        }


    public function verAgregarContratista()
    {
        return view('contratistas/agregar-contratista');
    }

    public function store(Request $request){
        //dd($request->all());
        
        $directoryPath = public_path('contractors') . "/" . $request->contractorName;
        File::makeDirectory($directoryPath, 0777, true, true);
        $contractor = new Contractor([
            'contractorName' => $request->contractorName, 
            'idIntern' => $request->idIntern, 
            'idProject_project' => $request->projectRelation,
            'email' => $request->email, 
            'phone' => $request->phone,
            'whatsapp' => $request->whats,
            'img_contractor' => $request->flImage 
        ]);
        $contractor->save();
        //return redirect()->route('proyectos/editar-proyecto.show', ['id' => $project->id])->with('success', 'Proyecto agregado correctamente.');
        

    }
}
