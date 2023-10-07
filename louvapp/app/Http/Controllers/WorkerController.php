<?php

namespace App\Http\Controllers;

use App\Models\Worker;
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
        //$worker = Worker::all();
        $worker = DB::table('workers')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            ->where('workers.status','=','0')
            ->get();
        return view('fuerza-trabajo/lista-trabajadores', ['workers' => $worker]);

    }

    public function indexC()
    {
        $totalTrabajadores = DB::table('workers')
            ->where('workers.status', '=', '0')
            ->count();


        //$worker = Worker::all();
        $worker = DB::table('workers')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            //->join('validations', 'workers.id', '=', 'validations.idWorker_workers')
            ->where('workers.status','=','0')
            ->get();
        return view('fuerza-trabajo/credenciales-trabajadores', [
            'workers' => $worker,
            'totalTrabajadores' => $totalTrabajadores,
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
        //obtener los puestos de trabajo
        $getJobs = DB::table('jobs')
            ->get();
        $getContractors = DB::table('contractors')
            ->get();

        return view('fuerza-trabajo/agregar-trabajador', [
            'contractors' => $getContractors,
            'jobs' => $getJobs,
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

        $worker = new Worker([
            'idJob_jobs' => $request->puesto,
            'idContractor_contractors' => $request->contratista,
            'idIntern_worker' => $request->contratista,
            'name' => $request->nombre,
            'lastName' => $request->apellido,
            'nss' => $request->nss,
            'nrp' => $request->nrp,
            'personalPhone' => $request->telefonoPersonal,
            'emergencyPhone' => $request->telefonoEmergencia,
            'blodType' => $request->tipoSangre,
            'chronicDiseases' => $request->enfermedades,
            'alergies' => $request->alergias,
            'status' => 0,
            'imgWorker' => $request->flImage,
            'foldeName' => $request->folderName
        ]);
        $worker->save();
        
        return redirect()->route('fuerza-trabajo.editar-trabajador.show', ['id' => $worker->id])->with('success', 'Usuario agregado correctamente.');
        //$this->show($worker->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //obtener los puestos de trabajo
        $getJobs = DB::table('jobs')
            ->get();

        $getContractors = DB::table('contractors')
        ->get();
        
        $getDocuments = DB::table('documents')
        ->where('idWorker_workers', $id)
        ->get();
        //obtenemos la validación de documentos del trabajador
        

        //obtener datos del trabajor
        $worker = DB::table('workers')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            ->where('workers.id', '=', $id)
            ->first();

        
        return view('fuerza-trabajo/editar-trabajador', [
            'worker' => $worker,
            'jobs' => $getJobs,
            'contractors' => $getContractors,
            'documents' => $getDocuments
        ]);
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
        //
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

    public function storeDocuments(Request $request){
        
        //return $request->file('file')->store('docs');
        /*$imageName = 'archivo.pdf';// Obtén el nombre de la imagen de alguna manera
        
        return $request->file('file')->storeAs(
            "public/uploads/contratista/{$request->folderNameCont}/{$request->foldeNameWorker}",$imageName
        );
        */
        // Verifica si se enviaron archivos
if ($request->hasFile('file')) {
    // Obtiene la colección de archivos
    $files = $request->file('file');

    // Obtiene el total de archivos en la colección
    $totalFiles = count($files);
    // Obtén la carpeta base donde se guardarán los archivos
    $baseFolder = "public/uploads/contratista/{$request->folderNameCont}/{$request->foldeNameWorker}";

    // Iterar a través de los archivos
    foreach ($files as $file) {
        // Genera un nombre único para cada archivo, por ejemplo, usando un timestamp
        $imageName = time() . '_' . $file->getClientOriginalName();

        // Almacena el archivo en la carpeta base con el nombre único
        $file->storeAs($baseFolder, $imageName);

        $documents = new Documents([
            'path' => $imageName,
            'idWorker_workers' => $request->workerId,
        ]);
        $documents->save();
        
    }

    // Puedes utilizar $totalFiles en tu lógica si lo necesitas
}

        return redirect()->back()->with('success', 'Archivos subidos exitosamente');
    
       
    }
    
}
