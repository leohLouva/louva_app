<?php

namespace App\Http\Controllers;

use Exception;
use DataTables;
use App\Models\User;
use App\Models\Contractor;
use App\Models\Worker_project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ContractorController extends Controller
{
    public function index()
    {

        $perPage = 8;
        $contractor = DB::table('contractors')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
   
        return view('contratistas/lista-contratista', [
            'contractors' => $contractor
        ]);
    }

    public function indexFuerza($id)
    {

        $worker = DB::table('users')
            ->join('jobs', 'users.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'users.idContractor_contractors', '=', 'contractors.idContractor')
            ->where('users.idContractor_contractors','=',$id)
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
            'rfcContractor' => $request->rfc,
            'emailContractor' => $request->email,
            'phoneContractor' => $request->telefono,
            'sitio_web' => $request->web,
            'actividad' => $request->actividad,
            'domicilioContractor' => $request->domicilio,
            'codigoPostalContractor' => $request->cp,
            'idEstado_estado' => $request->estado,
            'idMunicipio_municipio' => $request->location,
            'img_contractor' => $request->flImage
        ]);
        $contractor->save();

        $project = new Worker_project([
            'idContractor_project' => $contractor->idContractor,
            'idProyecto' => $request->idProyecto
        ]);


        $project->save();
        

        return redirect()->route('editar-contratista.show', ['id' => $contractor->idContractor])->with('success', 'Proyecto agregado correctamente.');
        
    }

    public function update(Request $request, $idContractor){

        $oContractor = new Contractor();
        $oContractor = Contractor::findOrFail($idContractor);
        
        $oContractor->update([
            'contractorName' => $request->nombreEmpresa,
            'rfcContractor' => $request->rfc,
            'emailContractor' => $request->email,
            'phoneContractor' => $request->telefono,
            'sitio_web' => $request->web,
            'actividad' => $request->actividad,
            'domicilioContractor' => $request->domicilio,
            'codigoPostalContractor' => $request->cp,
            'idEstado_estado' => $request->estado,
            'idMunicipio_municipio' => $request->location,
            'img_contractor' => $request->flImage
        ]);

        $oProject = Worker_project::where('idContractor_project', $idContractor)->first();

        if ($oProject) {
            // Actualizar los datos del proyecto del trabajador
            $oProject->update([
                'idProyecto' => $request->idProyecto
            ]);
        }
        

        return redirect()->route('editar-contratista.show', ['id' => $oContractor->idContractor])->with('success', 'Proyecto editado correctamente.');


    }


    public function show($id){
        //$contractor = Contractor::find($id);
        $contractor = DB::table('contractors')
            ->leftjoin('estados', 'contractors.idEstado_estado', '=', 'estados.idEstado')
            ->leftjoin('municipios', 'contractors.idMunicipio_municipio', '=', 'municipios.idMunicipio')
            ->join('proyecto_empresa', 'proyecto_empresa.idContractor_project', '=', 'contractors.idContractor')
            ->where('contractors.idContractor', $id)
            ->first();

        $getProjects = DB::table('projects')->get();

        $getStates = DB::table('estados')->get();

        $getProject_contractors = DB::table('proyecto_empresa')
            ->get();
        $getMunicipio = DB::table('municipios')
            ->join('estados_municipios', 'estados_municipios.municipios_id', '=', 'municipios.idMunicipio')
            ->where('estados_municipios.estados_id', '=', $contractor->idEstado_estado)
            ->get();
             
        return view('contratistas/editar-contratista', [
            'contractor' => $contractor,
            'projects' => $getProjects,
            'states' => $getStates,
            'locations' => $getMunicipio,
            'project_empresa' => $getProject_contractors
        ]);

    }
    public function buscarEmpresa(Request $request)
        {
            $q = $request->input('q');

            $contractors = Contractor::join('estados', 'contractors.idEstado_estado', '=', 'estados.idEstado')
            ->join('municipios', 'contractors.idMunicipio_municipio', '=', 'municipios.idMunicipio')
            ->where('contractorName', 'LIKE', "%$q%")
            ->orWhere('estados.estado', 'LIKE', "%$q%")
            ->orWhere('municipios.municipio', 'LIKE', "%$q%")
            ->paginate(5);

            //return view('tus-obras-partial', compact('projects'))->render();
            return view('contratistas/lista-contratista', ['contractors' => $contractors]);
        
            /*return response()->json([
                'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])
                'status' => '1',
                'message' => 'DOCUMENTO ALMACENADO CON ÉXITO',
                'projects' => $projects
            ]);*/
        }
}

