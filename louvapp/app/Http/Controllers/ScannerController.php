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

        $fechaFormateada = date("Y-m-d", strtotime($date));

        $worker = DB::table('users')
            //->join('worker_status_incidentes', 'users.status', '=', 'worker_status_incidentes.idWorker_status')
            ->join('contractors', 'users.idContractor_contractors', '=', 'contractors.idContractor')
            ->join('jobs', 'users.idJob_jobs', '=', 'jobs.idJob')
            //->join('proyecto_empresa', 'proyecto_empresa.idContractor_project', '=', 'users.idContractor_contractors')
            ->join('projects', 'projects.idProject', '=', 'users.idProject_user')
            ->where('users.idUser', '=', $id)
            ->get();

        $getJobs = DB::table('jobs')->get();
        
        $getContractors = DB::table('contractors')->get();

        $getNameDocuments = DB::table('documentType')->get();
        
        $getUser_type = DB::table('user_type')->get();
       

        $check = DB::table('attendences')
            ->where('attendences.idUser_worker', $id)
            ->whereDate('date', $fechaFormateada)
            ->first(); 


        if($check == NULL){//usuario no ha registrado entrada ni salida
            $arrayWorker = array(
                'date' => $date,
                'worker' => $worker,
                'jobs' => $getJobs,
                'contractors' => $getContractors,
                'types' => $getUser_type,
                'message' =>  '',
                'style' => '',
                'horaEntrada' => 'SIN ENTRADA REGISTRADA',
                'horaSalida' => 'SIN SALIDA REGISTRADA',
            );

        }else{ 
            if($check->endTime == NULL){//ahora vamos a chcar el registro de salida.  
                      
                $arrayWorker = array(
                    'date' => $date,
                    'worker' => $worker,
                    'jobs' => $getJobs,
                    'contractors' => $getContractors,
                    'types' => $getUser_type,
                    'message' =>  '',
                    'horaEntrada' => $check->startTime,
                    'horaSalida' => 'SIN SALIDA REGISTRADA',
                    'style' => ''
                );
            }else{
                $arrayWorker = array(
                    'date' => $date,
                    'worker' => $worker,
                    'jobs' => $getJobs,
                    'contractors' => $getContractors,
                    'types' => $getUser_type,
                    'message' =>  '',
                    'style' => '',
                    'horaEntrada' => $check->startTime,
                    'horaSalida' => $check->endTime,
                );
            }   
        }

        return view('fuerza-trabajo/scanner', compact('arrayWorker'));
    }

    public function checarEntrada(Request $request, $idWorker) {
        
        $today = now();
        $fechaHoy = $today->format('Y-m-d');
        $hora = $today->format('H:i:s');
        
        $latestAttendence = DB::table('attendences')
            ->where('idUser_worker', $idWorker)
            ->whereDate('date', $request->data['fechaFormateada'])
            ->first();

            if ($latestAttendence) {
                
                if($latestAttendence->endTime != null){
                    $horaSalida = $latestAttendence->endTime;
                }else{
                    $horaSalida = "Sin salida registrada";
                }

                $response = [
                    'redirect' => null,
                    'message' => 'YA REGISTRASTE UNA ENTRADA EL DÍA DE : ' . $request->data['fechaFormateada'] . ' A LAS ' . $latestAttendence->startTime,
                    'horaEntrada' =>$latestAttendence->startTime,
                    'horaSalida' => $horaSalida,
                    'status' => 0
                ];
                
            } else {
                // No hay un registro existente, puedes realizar la inserción
                $scanner = new Scanner([
                    'idUser_worker' => $idWorker,
                    'idContractor_contractors' => $request->data['idContractor_contractors'],
                    'idProject_project' => $request->data['idProject_project'],
                    'date' => $fechaHoy,
                    'startTime' => $request->data['clock']
                ]);
                $scanner->save();
            
                $response = [
                    'redirect' => redirect()->action([ScannerController::class, 'show'], ['date' => $fechaHoy, 'id' => $idWorker])->getTargetUrl(),
                    'message' => 'Entrada realizada correctamente',
                    'status' => 1
                ];
            }
            
            echo json_encode($response);
            
    }
    

    public function checarSalida(Request $request,$idWorker){
       

        $latestAttendence = DB::table('attendences')
        ->where('idUser_worker', $idWorker)
        ->whereDate('date', $request->data['fechaFormateada'])
        ->first();

        if ($latestAttendence == null) {
            $response = [
                'redirect' => null,
                'message' => 'DEBES AGREGAR UNA ENTRADA ANTES DE REALIZAR UNA SALIDA',
                'horaEntrada' =>'SIN ENTRADA REGISTRADA',
                'horaSalida' => 'SIN SALIDA REGISTRADA',
                'status' => 0
            ];
        }else{
            if($latestAttendence->endTime == null){
                $oScanner = new Scanner();
                $oScanner = Scanner::where('idUser_worker', $idWorker)
                    ->whereDate('date', $request->data['fechaFormateada'])
                    ->firstOrFail();
                $oScanner->update([
                        'endTime' => $request->data['clock']
                    ]);
                    $response = [
                        'redirect' => redirect()->action([ScannerController::class, 'show'], ['date' => $request->data['fechaFormateada'], 'id' => $idWorker])->getTargetUrl(),
                        'message' => 'Entrada realizada correctamente',
                        'status' => 1
                    ];
            }else{
                $response = [
                    'redirect' => null,
                    'message' => 'YA HAS REGISTRADO LA SALIDA DEL TRABAJADOR',
                    'horaEntrada' =>'SIN ENTRADA REGISTRADA',
                    'horaSalida' => 'SIN SALIDA REGISTRADA',
                    'status' => 0
                ];
            }
            
        }
        echo json_encode($response);
            
        
    }

}
