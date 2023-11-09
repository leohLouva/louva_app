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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $getJobs = DB::table('jobs')->get();
        
        $getContractors = DB::table('contractors')
            //->join('proyecto_empresa', 'contractors.idContractor', '=', 'proyecto_empresa.idContractor_project')
            ->get();

        $getNameDocuments = DB::table('documentType')->get();

        $getUser_type = DB::table('user_type')->get();
        
        $getDocuments = DB::table('documents')
            ->leftjoin('documentType', 'documentType.idDocument', '=', 'documents.idDocument_documentType')
            ->where('idWorker_workers', $id)
            ->get();

        $worker = DB::table('workers')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            ->join('users', 'workers.idUser_worker', '=', 'users.id')
            ->leftjoin('proyecto_empresa', 'workers.idContractor_contractors', '=', 'proyecto_empresa.idContractor_project')
            ->leftjoin('projects', 'proyecto_empresa.idProyecto', '=', 'projects.idProject')
            ->where('workers.idWorker', '=', $id)
            ->first();

        

            $getProjects = DB::table('projects')
                ->join('proyecto_empresa', 'projects.idProject', '=', 'proyecto_empresa.idProyecto')
                ->where('idContractor_project','=',$worker->idContractor_contractors)
                ->get();

            

            $arrayWorker = array(
                'worker' => $worker,
                'jobs' => $getJobs,
                'contractors' => $getContractors,
                'documents' => $getDocuments,
                'aDocuments' => $getNameDocuments,
                'types' => $getUser_type,
                'tusDocumentos' => $getDocuments->count(),
                'totalDocumentos' => $getNameDocuments->count(),
                'projects' => $getProjects
            );

        return view('fuerza-trabajo/editar-trabajador',  compact('arrayWorker'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {

        $worker = new Worker([
            'idUser_worker'=> $worker->id,
            'idJob_jobs' => $request->puesto,
            'idContractor_contractors' => $request->contratista,
            'name' => strtoupper($request->nombre),
            'lastName' => strtoupper($request->apellido),
            'curp' => strtoupper($request->curp),
            'rfc' => strtoupper($request->rfc),
            'nss' => strtoupper($request->nss),
            'nrp' => strtoupper($request->nrp),
            'personalPhone' => $request->telefonoPersonal,
            'emergencyPhone' => $request->telefonoEmergencia,
            'blodType' => strtoupper($request->tipoSangre),
            'chronicDiseases' => strtoupper($request->enfermedades),
            'alergies' => strtoupper($request->alergias),
            'status' => 1,
            'imgWorker' => $request->flImage,
            'foldeName' => $request->folderName
        ]);
        
        return redirect()->route('fuerza-trabajo.editar-trabajador.show', ['id' => $worker->id])->with('success', 'Usuario editado correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        //
    }

    public function storeDocuments(Request $request)
    {

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $baseFolder = "public/uploads/contratista/{$request->folderNameCont}/{$request->foldeNameWorker}";
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs($baseFolder, $imageName);
                $documents = new Documents([
                    'path' => $imageName,
                    'idWorker_workers' => $request->workerId,
                    'idDocument_documentType' => $request->documentType
                ]);
                $documents->save();
            }
        }
        return redirect()->back()->with('success', 'Archivos subidos exitosamente');
    }

    public function eliminar(Request $request,$id)
    {
        $documento = documents::find($id);
        if ($documento) {
            // Elimina el archivo del almacenamiento
            $rutaArchivo = 'uploads/contratista/' . $request->folderContractor . '/' . $request->folderWorker . '/' . $request->path;
            Storage::delete($rutaArchivo);

            // Elimina el registro de la base de datos
            $documento->delete();
        }

        return redirect()->back()->with('success', 'El archivo ha sido eliminado con éxito.');
    }
    
}
