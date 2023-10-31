<?php

namespace App\Http\Controllers;

use App\Models\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ScannerController extends Controller
{
    //
    public function show($date,$id)
    {
        $getJobs = DB::table('jobs')->get();
        $getContractors = DB::table('contractors')->get();
        $getNameDocuments = DB::table('documentType')->get();
        $getUser_type = DB::table('user_type')->get();
       
        $getDocuments = DB::table('documents')
            ->leftjoin('documentType', 'documentType.idDocument', '=', 'documents.idDocument_documentType')
            ->where('idWorker_workers', $id)
            ->get();
        
        $worker = DB::table('workers')
            ->join('users', 'workers.idUser_worker', '=', 'users.id')
            ->join('worker_status_incidentes', 'workers.status', '=', 'worker_status_incidentes.idWorker_status')
            ->join('contractors', 'workers.idContractor_contractors', '=', 'contractors.idContractor')
            ->join('jobs', 'workers.idJob_jobs', '=', 'jobs.idJob')
            ->join('proyecto_empresa', 'proyecto_empresa.idContractor_project', '=', 'contractors.idContractor')
            ->join('projects', 'projects.id', '=', 'proyecto_empresa.idProyecto')
            ->where('workers.idWorker', '=', $id)
            ->first();

        //checaremos que no exista registro de entrada de el día en curso
        $check = DB::table('attendences')
            ->where('attendences.idUser_worker', $id)
            ->whereDate('date', now()->toDateString())
            ->first(); 
        $today = now();
        
        if($check == NULL){//usuario no ha registrado entrada ni salida
            $arrayWorker = array(
                'date' => $date,
                'worker' => $worker,
                'jobs' => $getJobs,
                'contractors' => $getContractors,
                'types' => $getUser_type,
                'message' =>  'Este usuario No ha entrado ni salido',
                'style' => 'style="display:none"'

            );

        }else{ 
            if($check->endTime == NULL){//ahora vamos a chcar el registro de salida.        
                $arrayWorker = array(
                    'date' => $date,
                    'worker' => $worker,
                    'jobs' => $getJobs,
                    'contractors' => $getContractors,
                    'types' => $getUser_type,
                    'message' =>  'Este usuario no ha registrado salida',
                    'style' => 'style="display:block"'
                );
            }else{
                $arrayWorker = array(
                    'date' => $date,
                    'worker' => $worker,
                    'jobs' => $getJobs,
                    'contractors' => $getContractors,
                    'types' => $getUser_type,
                    'message' =>  'Este usuario ha registrado a las '.$check->startTime.' su ENTRADA y  a las '.$check->endTime.' su SALIDA hoy '. $today->format('Y-m-d'),
                    'style' => 'style=display:none'
                );
            }   
        }

        return view('fuerza-trabajo/scanner', compact('arrayWorker'));
    }

    public function checarEntrada(Request $request, $idWorker){
        //startTime
        $today = now();
        $fecha = $today->format('Y-m-d'); // Obtiene la fecha (Año-Mes-Día)
        $hora = $today->format('H:i:s'); // Obtiene la hora (Horas:Minutos:Segundos)
        $scanner = new Scanner([
            'idUser_worker' => $idWorker,
            'idContractor_contractors' => $request->idContractor_contractors,
            'idProject_project' => $request->idProject_project,
            'date' => $fecha,
            'startTime' => $hora
        ]);
        
        $scanner->save();
        return redirect()->action([ScannerController::class, 'show'], ['date' => $fecha,'id' => $idWorker]);
    }

    public function checarSalida($idWorker){


    try {
        $today = now();
        $fecha = $today->format('Y-m-d'); // Obtiene la fecha (Año-Mes-Día)
        $hora = $today->format('H:i:s'); // Obtiene la hora (Horas:Minutos:Segundos)
        $oScanner = new Scanner();
        $oScanner = Scanner::where('idUser_worker', $idWorker)
            ->whereDate('date', $fecha)
            ->firstOrFail();
        $oScanner->update([
                'endTime' => $hora
            ]);

            return redirect()->action([ScannerController::class, 'show'], ['date' => $fecha,'id' => $idWorker]);

        // El registro se encontró con éxito
        // Puedes realizar acciones con $oScanner aquí
    } catch (ModelNotFoundException $e) {
        // El registro no se encontró
        // Maneja la excepción aquí, por ejemplo, redirigiendo o mostrando un mensaje de error
        return redirect()->back()->with('error', 'Registro no encontrado.');
    }
       
    }

}
