<?php

namespace App\Http\Controllers;

use Exception;
use DataTables;
use App\Models\User;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContractorController extends Controller
{
    //
    public function index()
        {
            //$project = Project::all(); 
            $contractor = DB::table('contractors')
            ->leftjoin('projects', 'projects.id', '=', 'contractors.idProject_project')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            return view('contratistas/lista-contratista', ['contractors' => $contractor]);
        }


    public function verAgregarContratista()
    {
        return view('contratistas/agregar-contratista');
    }

    public function store(Request $request){
        //dd($request->all());

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
