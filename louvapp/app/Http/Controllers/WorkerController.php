<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use App\Models\Worker_project;
use App\Models\Documents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $worker = DB::table('workers')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            ->where('workers.status','=','1')
            ->get();
            
            $totalTrabajadores = $worker->count();
        
            return view('fuerza-trabajo/lista-trabajadores', [
                'workers' => $worker,
                'totalTrabajadores' => $totalTrabajadores,
            ]);

    }
    
    

    public function indexC()
    {

        $projects = DB::table('projects')
            ->get();
        
        return view('fuerza-trabajo/reporte-trabajadores', [
            'projects' => $projects
        ]);


    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function verAgregarTrabajador()
    {
        //obtener el tipo de trabajador
        $getUser_type = DB::table('user_type')
        ->get();

        //obtener los puestos de trabajo
        $getJobs = DB::table('jobs')
            ->get();
        //obtener las empresas
        $getContractors = DB::table('contractors')
            ->get();
        
        $project = DB::table('projects')
                ->get();

        return view('fuerza-trabajo/agregar-trabajador', [
            'contractors' => $getContractors,
            'jobs' => $getJobs,
            'types' =>$getUser_type,
            'projects' =>$project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       
    try{
        DB::beginTransaction();
        
        $user = new User([
            'userName' => $request->data['nombreUsuario'], 
            'password' => bcrypt($request->data['password']),
            'idType_user_type' => $request->data['tipoUsuario'],
            'email' => $request->data['correo'], 
            'isDisable' => 0
        ]);
        $user->save(); 

        $worker = new Worker([
                'idUser_worker'=> $user->id,
                'idJob_jobs' => $request->data['puesto'],
                'idContractor_contractors' => $request->data['contratista'],
                'name' => strtoupper($request->data['nombre']),
                'lastName' => strtoupper($request->data['apellido']),
                'curp' => strtoupper($request->data['curp']),
                'rfc' => strtoupper($request->data['rfc']),
                'nss' => strtoupper($request->data['nss']),
                'personalPhone' => $request->data['telefonoPersonal'],
                'emergencyPhone' => $request->data['telefonoEmergencia'],
                'blodType' => strtoupper($request->data['tipoSangre']),
                'chronicDiseases' => strtoupper($request->data['enfermedades']),
                'alergies' => strtoupper($request->data['alergias']),
                'status' => 1,
                'imgWorker' => 'NULL',
                'foldeName' => $user->id . '-' .$request->data['nombre']
            ]);
        $worker->save();
        
        $worker1 = new Worker_project([
            'idUser_worker_project'=> $user->id,
            'idProject_worker_project' => $request->data['idProyecto'],
            'status_worker_project' => $request->data['nombre'],
            
        ]);
        
        $worker1->save();
        //dd($worker->idWorker);
        DB::commit();
            
        //return redirect()->route('fuerza-trabajo.editar-trabajador.show', ['idWorker' => $worker->idWorker])->with('success', 'Usuario agregado correctamente.');
        return response()->json([
            'redirect' => route('fuerza-trabajo.editar-trabajador.show', ['idWorker' => $worker->idWorker])
        ]);

        } catch (\Exception $e) {
            DB::rollback(); // Deshace la transacción en caso de error
            // Manejar el error o lanzar una excepción si es necesario
           dd("hay un error en el insert " . $e); 
        }

    }

 




    
}
