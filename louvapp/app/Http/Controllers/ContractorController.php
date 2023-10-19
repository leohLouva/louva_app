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
    public function index()
    {

        $contractor = DB::table('contractors')
        ->leftjoin('projects', 'projects.id', '=', 'contractors.idProject_project')
        ->get();

        return view('contratistas/lista-contratista', [
            'contractors' => $contractor
        ]);
    }

    public function indexFuerza($id)
    {

        $worker = DB::table('workers')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            ->where('workers.idContractor_contractors','=',$id)
            ->get();
            
            $totalTrabajadores = $worker->count();
        
            return view('fuerza-trabajo/lista-trabajadores', [
                'workers' => $worker,
                'totalTrabajadores' => $totalTrabajadores,
            ]);
            

    }
        


    public function verAgregarContratista()
    {
        $getProjects = DB::table('projects')->get();
        $getStates = DB::table('estados')->get();
            
        return view('contratistas/agregar-contratista', [
            'projects' => $getProjects,
            'states' => $getStates
        ]);
    }

    public function store(Request $request){
        
        $contractor = new Contractor([
            'contractorName' => $request->nombreEmpresa,
            'rfc' => $request->rfc,
            'idProject_project' => $request->nombreProyecto,
            'email' => $request->email,
            'phone' => $request->telefono,
            'sitio_web' => $request->web,
            'actividad' => $request->actividad,
            'domicilio' => $request->domicilio,
            'codigoPostal' => $request->cp,
            'idEstado_estado' => $request->estado,
            'idMunicipio_municipio' => $request->municipio,
            'folderName' => $request->folderName,
            'img_contractor' => $request->flImage
        ]);
        $contractor->save();
        return redirect()->route('contratista/editar-contratista.show', ['id' => $contractor->idContractor])->with('success', 'Proyecto agregado correctamente.');
    }

    public function update(Request $request, $idContractor){
        $oContractor = new Contractor();
        $oContractor = Contractor::findOrFail($idContractor);
        
        $oContractor->update([
            'contractorName' => $request->nombreEmpresa,
            'rfc' => $request->rfc,
            'idProject_project' => $request->nombreProyecto,
            'email' => $request->email,
            'phone' => $request->telefono,
            'sitio_web' => $request->web,
            'actividad' => $request->actividad,
            'domicilio' => $request->domicilio,
            'codigoPostal' => $request->cp,
            'idEstado_estado' => $request->estado,
            'idMunicipio_municipio' => $request->municipio,
            'folderName' => $request->folderName,
            'img_contractor' => $request->flImage
        ]);

        return redirect()->route('editar-contratista.show', ['id' => $oContractor->idContractor])->with('success', 'Proyecto editado correctamente.');


    }


    public function show($id){
        //$contractor = Contractor::find($id);
        $contractor = DB::table('contractors')
        ->leftjoin('estados', 'contractors.idEstado_estado', '=', 'estados.idEstado')
        ->leftjoin('municipios', 'contractors.idMunicipio_municipio', '=', 'municipios.idMunicipio')
        ->where('contractors.idContractor', $id)
        ->first();

        $getProjects = DB::table('projects')->get();

        $getStates = DB::table('estados')->get();

        return view('contratistas/editar-contratista', [
            'contractor' => $contractor,
            'projects' => $getProjects,
            'states' => $getStates
        ]);

    }
}
/*


     
   

*/
