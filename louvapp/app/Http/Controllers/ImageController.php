<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManagerStatic as Image;


class ImageController extends Controller
{

    public function storeProject(Request $request)
    {
        try{
            $imageFile = $request->file('file');
            $imageName = Str::uuid() . "." . $imageFile->extension();
            $imageServer = Image::make($imageFile);
            $imageServer->fit(1000,1000);
            //$directory = "uploads/".$request->typeOfView;
            $imagePath = public_path('uploads/proyectos') . '/' . $imageName;
            $imageServer->save($imagePath);
            return response()->json([
                'status' => 'Success',
                'message' => 'Imágen almacenada con éxito',
                'imagen' => $imageName
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Error',
                'message' => $e->getMessage()
            ]);
        }

    }

    public function storeUser(Request $request)
    {

        $imageFile = $request->file('file');
        $imageName = Str::uuid() . "." . $imageFile->extension();
        $imageServer = Image::make($imageFile);
        $imageServer->fit(1000,1000);
        //$directory = "uploads/".$request->typeOfView;
        $imagePath = public_path('uploads/usuarios') . '/' . $imageName;
        $imageServer->save($imagePath);
        return response()->json([
            'imagen' => $imageName
        ]);

    }

    public function storeContractor(Request $request)
    {
        
        $imageFile = $request->file('file');
        $imageName = Str::uuid() . "." . $imageFile->extension();
        $imageServer = Image::make($imageFile);
        $imageServer->fit(1000,1000);
        
        //creamos el directorio
        $randomFolderName = uniqid($request->nombreEmpresaF . '_');
        $my_dir = 'uploads/'.$request->typeOfView.'/' .$randomFolderName;

        if (!is_dir($my_dir)) {
            if (mkdir($my_dir, 0777, true)) {
                $imagePath = public_path($my_dir) . '/' . $imageName;
                $imageServer->save($imagePath);
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Imágen almacenada con éxito',
                    'folderName' => $randomFolderName,
                    'flImage' => $imageName,
                    'imagen' => $imageName
                ]);
            } else {
                echo "No se pudo crear el directorio.";
            }
        } else {
            echo "El directorio ya existe.";
        }
        
        return response()->json([
            'imagen' => $imageName
        ]);

    }

    //guardamos la imagen del perfil del trabajador
    public function storeImgProfileWorker(Request $request)
    {
        $imageFile = $request->file('file');
        $imageName = Str::uuid() . "." . $imageFile->extension();
        $imageServer = Image::make($imageFile);
        $imageServer->fit(1000,1000);
        
        //creamos el directorio
        $randomFolderName = uniqid($request->folderName . '_');
        $my_dir = 'uploads/empresa/' .$request->folderNameCont.'/'.$request->folderTrabajador;

        if (!is_dir($my_dir)) {
            if (mkdir($my_dir, 0777, true)) {
                $imagePath = public_path($my_dir) . '/' . $imageName;
                $imageServer->save($imagePath);
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Imágen almacenada con éxito',
                    'folderName' => $randomFolderName,
                    'flImage' => $imageName,
                    'imagen' => $imageName
                ]);
            } else {
                echo "No se pudo crear el directorio.";
                return;
            }
        } else {
            $imagePath = public_path($my_dir) . '/' . $imageName;
            $imageServer->save($imagePath);
            $worker = Worker::find($request->idWorker_);
        
            if ($worker) {
            
                //$worker->imgWorker = $imageName;
                //$worker->save();
                $worker->update([
                    'imgWorker' => $imageName
                ]);

                return redirect()->route('fuerza-trabajo.editar-trabajador.show', ['idWorker' => $request->idWorker_])->with('success', 'Usuario editado correctamente.');

            } else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Hubo un problema al guardar el nombre de la imagen'
                ]);
            }
            /*return response()->json([
                'status' => 'Success',
                'message' => 'Imágen almacenada con éxito en directorio existente',
                'folderName' => $randomFolderName,
                'flImage' => $imageName,
                'imagen' => $imageName
            ]);*/
        }
        
        
            
    }

    

    public function createDirectory($typeOfView){
        // Genera un nombre aleatorio para la carpeta
        $randomFolderName = uniqid('folder_');

        // Directorio donde deseas crear la carpeta (debes ajustarlo a tu ruta específica)
        $directoryPath = '/uploads/'.$typeOfView.'/' . $randomFolderName;

        // Verifica si la carpeta ya existe, y si no, créala
        if (!file_exists($directoryPath)) {
            //mkdir($directoryPath, 0755, true); // Crea la carpeta con permisos 0777 (ajusta los permisos según tus necesidades)
            echo "Carpeta creada con el nombre: " . $randomFolderName;
        } else {
            echo "La carpeta ya existe. Nombre de carpeta: " . $randomFolderName;
        }
    }

}