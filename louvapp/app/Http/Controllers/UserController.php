<?php

namespace App\Http\Controllers;

use Exception;
use DataTables;
use App\Models\User;
use App\Models\Documents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
    
class UserController extends Controller
{
    //ver lista de usuarios
    public function index()
    {

        $worker = DB::table('users')
            ->join('jobs', 'users.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'users.idContractor_contractors', '=', 'contractors.idContractor')
            ->join('user_type', 'users.idType_user_type', '=', 'user_type.idType')
            ->where('users.isDisable','=','0')
            ->where('users.isDisable','=','0')
            ->get();
            
        $totalTrabajadores = $worker->count();

        return view('fuerza-trabajo/lista-trabajadores', [
            'workers' => $worker,
            'totalTrabajadores' => $totalTrabajadores,
        ]);
            
    }

    public function store(Request $request)
    {
     try{   
            
        DB::beginTransaction();
            $user = new User([
                'idContractor_contractors' => $request->data['contratista'],
                'idJob_jobs' => $request->data['puesto'],
                'idType_user_type' => $request->data['tipoUsuario'],
                'idProject_user' => $request->data['idProyecto'],
                'userName' => $request->data['nombreUsuario'],
                'password' => Hash::make($request->password),
                'email' => $request->data['correo'],
                'isDisable' => 0,
                'name' => $request->data['nombre'],
                'lastName' => $request->data['apellido'],
                'rfc' => $request->data['rfc'],
                'curp' => $request->data['curp'],
                'nss' => $request->data['nss'],
                'personalPhone' => $request->data['telefonoPersonal'],
                'emergencyPhone' => $request->data['telefonoEmergencia'],
                'blodType' => $request->data['tipoSangre'],
                'chronicDiseases' => $request->data['enfermedades'],
                'alergies' => $request->data['alergias'],
                'imgWorker' => $request->data['flImage'],
                'status' => 0
            ]);

            $user->save();
            DB::commit();
            return response()->json([
                'status' => '1',
                'title' => 'ÉXITO',
                'message' => 'USUARIO ALMACENADO CON ÉXITO',
                'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])
            ]);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => '2',
                'title' => 'ERRROR',
                'message' => 'ERROR AL AGREGAR USUARIO: ' . $e->getMessage(),
            ], 500); 
        }
    }


        //guardamos la imagen del perfil del trabajador
        public function storeImgProfileWorker(Request $request)
        {

            try{
                $imageFile = $request->file('file');
                $imageName = Str::uuid() . "." . $imageFile->extension();
                $imageServer = Image::make($imageFile);
                $imageServer->fit(1000,1000);
                
                $imagePath = public_path('uploads/user_profile') . '/' . $imageName;
                $imageServer->save($imagePath);
                
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Imágen almacenada con éxito',
                    'flImage' => $imageName,
                    'imagen' => $imageName,
                    'redirect' => 0
                ]);
                //return redirect()->route('fuerza-trabajo.editar-trabajador.show', ['idWorker' => $request->idWorker_])->with('success', 'Usuario editado correctamente.');
            } catch (\Exception $e) {
                // Manejar la excepción
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Error al almacenar la imagen: ' . $e->getMessage(),
                ], 500); // Puedes ajustar el código de estado HTTP según sea necesario
            }
        }

        public function storeImgProfileWorkerUpdate(User $user, Request $request)
        {   
            
            try{
                $imageFile = $request->file('file');
                $imageName = Str::uuid() . "." . $imageFile->extension();
                $imageServer = Image::make($imageFile);
                $imageServer->fit(1000,1000);
                
                $imagePath = public_path('uploads/user_profile') . '/' . $imageName;
                $imageServer->save($imagePath);

                $user = User::find($request->idWorker_);
                if ($user) {
                    // Actualiza el campo imgWorker
                    $user->update([
                        'imgWorker' => $imageName,
                    ]);
                }else{
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'El usuario no existe',
                    ], 404);
                }

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Imágen almacenada con éxito',
                    'flImage' => $imageName,
                    'imagen' => $imageName,
                    'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])

                ]);
                //return redirect()->route('fuerza-trabajo.editar-trabajador.show', ['idWorker' => $request->idWorker_])->with('success', 'Usuario editado correctamente.');
            } catch (\Exception $e) {
                // Manejar la excepción
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Error al almacenar la imagen: ' . $e->getMessage(),
                ], 500); // Puedes ajustar el código de estado HTTP según sea necesario
            }
        }
    public function show($id)
    {
        $getJobs = DB::table('jobs')->get();
        
        $getContractors = DB::table('contractors')
            //->join('proyecto_empresa', 'contractors.idContractor', '=', 'proyecto_empresa.idContractor_project')
            ->get();

        //$getNameDocuments = DB::table('documentType')->get();

        $getUser_type = DB::table('user_type')->get();

        $worker = DB::table('users')
            ->join('jobs', 'users.idJob_jobs', '=', 'jobs.idJob')
            ->join('contractors', 'users.idContractor_contractors', '=', 'contractors.idContractor')
            ->join('projects', 'users.idProject_user', '=', 'projects.idProject')
            //->join('proyecto_empresa', 'users.idProject_user', '=', 'proyecto_empresa.idProyecto')
            ->where('users.idUser', '=', $id)
            ->get();

        $getProjects = DB::table('projects')
            ->select('idProject', 'projectName')
            ->join('proyecto_empresa', 'projects.idProject', '=', 'proyecto_empresa.idProyecto')
            ->where('proyecto_empresa.idContractor_project', $worker[0]->idContractor_contractors)
            ->get();

            $getDocumentation = DB::table('documentType')->get(); 

            $getDocumentsWorker = DB::table('documents')
                ->leftjoin('documentType', 'documentType.idDocument_type', '=', 'documents.typeOfDocument')
                ->where('idWorker_workers', $id)
                ->get();

            $documentIds = $getDocumentsWorker->pluck('typeOfDocument')->toArray();
            
            $documentsNotInWorker = $getDocumentation->reject(function ($document) use ($documentIds) {
                return in_array($document->idDocument_type, $documentIds);
            });

            $totalDocumentTypes = DB::table('documentType')->count();
            $validDocuments = DB::table('documents')
            ->join('documentType', 'documentType.idDocument_type', '=', 'documents.typeOfDocument')
            ->where('idWorker_workers', $id)
            ->where('validated', true) // Ajusta esto según tu esquema de base de datos
            ->get();
        
            // Contar documentos válidos
            $countValidDocuments = count($validDocuments);
            
            // Verificar si todos los documentos están validados
            if ($countValidDocuments == $totalDocumentTypes) {
                // Todos los documentos están validados
                $validated = 1;
                $messageValidated = "TODOS TUS DOCUMENTOS ESTÁN VALIDADOS.";
            } else {
                // Al menos un documento no está validado
                $validated = 0;
                $messageValidated = "TIENES " . $countValidDocuments . " de " . $totalDocumentTypes . " DOCUMENTOS VALIDADOS";
            }

            
            
            $arrayWorker = array(
                'worker' => $worker,
                'jobs' => $getJobs,
                'contractors' => $getContractors,
                'documents' => $getDocumentsWorker,
                'aDocuments' => $documentsNotInWorker,
                'types' => $getUser_type,
                'tusDocumentos' => $getDocumentsWorker->count(),
                'totalDocumentos' => $getDocumentation->count(),
                'projects' => $getProjects,
                'validated' => $validated,
                'messageValidated' => $messageValidated

            );

        return view('fuerza-trabajo/editar-trabajador',  compact('arrayWorker'));
        
    }

    public function getProjects($contratistaId){

        $getProjects = DB::table('projects')
            ->select('idProject', 'projectName')
            ->join('proyecto_empresa', 'projects.idProject', '=', 'proyecto_empresa.idProyecto')
            ->where('proyecto_empresa.idContractor_project', $contratistaId)
            ->get();
            return response()->json(['proyectos' => $getProjects]);
            
    }

    public function update(User $user, Request $request, $idUser){
        try{   
        
            DB::beginTransaction();
                $user = User::find($idUser);
                $user->idContractor_contractors = $request->data['contratista'];
                $user->idJob_jobs = $request->data['puesto'];
                $user->idType_user_type = $request->data['tipoUsuario'];
                $user->idProject_user = $request->data['idProyecto'];
                $user->userName = $request->data['nombreUsuario'];
                $user->email = $request->data['correo'];
                $user->name = $request->data['nombre'];
                $user->lastName = $request->data['apellido'];
                $user->rfc = $request->data['rfc'];
                $user->curp = $request->data['curp'];
                $user->nss = $request->data['nss'];
                $user->personalPhone = $request->data['telefonoPersonal'];
                $user->emergencyPhone = $request->data['telefonoEmergencia'];
                $user->blodType = $request->data['tipoSangre'];
                $user->chronicDiseases = $request->data['enfermedades'];
                $user->alergies = $request->data['alergias'];
                $user->updated_at = now();
                $user->save();
            DB::commit();
            return response()->json([
                'status' => '1',
                'title' => 'ÉXITO',
                'message' => 'USUARIO ALMACENADO CON ÉXITO',
                'tab' => 'home',
                'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $idUser]),
            ]);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => '2',
                'title' => 'ERRROR',
                'message' => 'ERROR AL ACTUALIZAR USUARIO: ' . $e->getMessage(),
            ], 500); 
        }
    }

    public function storeDocuments(Request $request)
    {
            if ($request->contractorName) {
            $file = $request->file('file');
            $baseFolder = "public/uploads/contractors/" . $request->contractorName;

            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs($baseFolder, $imageName);

            $documents = new Documents([
                'path' => $imageName,
                'idWorker_workers' => $request->workerId,
                'typeOfDocument' => $request->typeOfDocument,
                'validated' => 0
            ]);
            $documents->save();

            return response()->json([
            'status' => '1',
            'message' => 'DOCUMENTO ALMACENADO CON ÉXITO',
            'documento' => $imageName
        ]);
        }else{
            return response()->json([
                'status' => '2',
                'message' => 'ERROR ALMACENANDO EL DOCUMENTO: ',
                'documento' => $imageName
            ]);
        }
        
        
    }

    public function getUploadsDocumentsContent() {
        
            $getDocumentation = DB::table('documentType')->get(); 

            $getDocumentsWorker = DB::table('documents')
                ->leftjoin('documentType', 'documentType.idDocument_type', '=', 'documents.idDocument')
                ->where('idWorker_workers', $id)
                ->get();

            // Obtén solo los valores 'idDocument' de cada documento
            $documentIds = $getDocumentsWorker->pluck('idDocument')->toArray();
            
            // Filtra los documentos que no están en $documentIds
            $documentsNotInWorker = $getDocumentation->reject(function ($document) use ($documentIds) {
                return in_array($document->idDocument_type, $documentIds);
            });
            
            $arrayWorker = array(
                'documents' => $getDocumentsWorker,
                'aDocuments' => $documentsNotInWorker,
                'tusDocumentos' => $getDocumentsWorker->count(),
                'totalDocumentos' => $getDocumentation->count()
            );

        return view('partials.documents', compact('arrayWorker'));
    }

    public function eliminar(Request $request,$id)
    {
        
        try {

            $documento = Documents::find($id);
            $idUser = $documento->idWorker_workers;

            if ($documento) {
                $rutaArchivo = 'public/uploads/contractors/'.$request->contractorName.'/'.$request->path;
                Storage::delete($rutaArchivo);
                $documento->delete();
                return response()->json([
                    'status' => '1',
                    'title' => 'ÉXITO',
                    'message' => 'DOCUMENTO ELIMINADO CON ÉXITO',
                    'idUser' => $idUser
                    //'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])
                ]);
                //return redirect()->back()->with('success', 'El archivo ha sido eliminado con éxito.')->with('activeTab', 'uploaded');

            }
        } catch (\Exception $e) {

            return response()->json([
                'status' => '2',
                'title' => 'ERROR',
                'message' => 'DOCUMENTO NO ELIMINADO ' . $e,
                'idUser' => $idUser
                //'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])
            ]);
            
        }
        

    }

    public function obtenerDocumentos($idUser) {

        $getDocumentsWorker = DB::table('documents')
                ->join('documentType', 'documentType.idDocument_type', '=', 'documents.typeOfDocument')
                ->join('users', 'users.idUser', '=', 'documents.idWorker_workers')        
                ->join('contractors', 'contractors.idContractor', '=', 'users.idContractor_contractors')
                ->where('idWorker_workers', $idUser)
                ->get();
        $getCountDocu = $getDocumentsWorker->count();
        if($getCountDocu == 0){
            return view('fuerza-trabajo.partials.documentos', [
                                                                'documentos' => NULL,
                                                                'count' => $getCountDocu
            ]);
        }else{
            return view('fuerza-trabajo.partials.documentos', [
                                                                'documentos' => $getDocumentsWorker,
                                                                'count' => $getCountDocu
                                                            ]);
        }
    }
    
    public function getValidateDocuments($idUser){
        $getDocumentsWorker = DB::table('documents')
                ->leftjoin('documentType', 'documentType.idDocument_type', '=', 'documents.typeOfDocument')
                ->where('idWorker_workers', $idUser)
                ->get();

        return view('fuerza-trabajo.partials.validar', [
                'documentos' => $getDocumentsWorker,
                'tusDocumentos' => $getDocumentsWorker->count()
        ]);
        
    }

    public function actualizarEstadoDocumentos(User $user, Request $request)
    {

    try {
        $formData = $request->data;
        foreach ($formData as $idDocument => $isChecked) {

            $documento = Documents::findOrFail($idDocument);
            $documento->validated = $isChecked;
            $documento->save();
        }

        return response()->json([
            'status' => 1,
            'message' => 'DOCUMENTOS VALIDADO CON ÉXITO',
            'tab' => 'validate',
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 2,
            'message' => 'ERROR AL ACTUALIZAR LA VALIDACION DE LOS DOCUMENTOS: ' . $e->getMessage(),
        ], 500);
    }
}
    public function updatePassword(Request $request, $idUser){
        
    
        try {
            $user = User::findOrFail($idUser);
            $user->update([
                'password' => Hash::make($request->data['password']),
            ]);
            return response()->json([
                'status' => '1',
                'title' => 'ÉXITO',
                'message' => 'LA CONTRASEÑA SE ACTUALIZÓ SATISFACTORIAMENTE',
                'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $idUser])
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => '2',
                'title' => 'ERROR',
                'message' => 'USUARIO NO ENCONTRADO' . $e,
                //'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])
            ]);
        } catch (\Exception $e) {
            
            return response()->json([
                'status' => '2',
                'title' => 'ERROR',
                'message' => 'HUBO UN ERROR AL ACTUALIZAR ' . $e,
                //'redirect' =>  route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $user->idUser])
            ]);
        }
    
    }
}
