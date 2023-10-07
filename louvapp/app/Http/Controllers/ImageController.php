<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManagerStatic as Image;


class ImageController extends Controller
{

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
        $randomFolderName = uniqid('folder_');
        $my_dir = 'uploads/'.$request->typeOfView.'/'.$randomFolderName;
        if(!is_dir($my_dir)){
            mkdir($my_dir);
            echo "Se hizo el directorio " . $my_dir;
        
        }else{
            echo "Algo falló ";
            
        }
        //$directory = $this->createDirectory($request->typeOfView);
        $imagePath = public_path('uploads/'.$request->typeOfView.'/'.$randomFolderName) . '/' . $imageName;
        $imageServer->save($imagePath);
        return response()->json([
            'imagen' => $imageName
        ]);


    }

    public function storeImgProfileWorker(Request $request)
    {
        
        $contractor = DB::table('contractors')
            ->where('contractors.idContractor', '=', $request->idContractor)
            ->first();
        
        if($contractor == null){
            return response()->json([
                'message' => 'Contratista no tiene directorio' 
            ]);
        }else{
            
            $directorio = public_path("uploads/contratista/".$contractor->folderName);
            if (is_dir($directorio)) {
                $archivos = scandir($directorio);
                foreach ($archivos as $archivo) {
                    $rutaArchivo = $directorio . '/' . $archivo;
                    
                    if (!is_dir($rutaArchivo)) {
                        //dd("Directorio encontrado: " . $archivo);
                        return response()->json([
                            'message' => "No se encontró el directorio"
                        ]);
                    }else{
                        //creamos directorio unico para el trabajador 
                        $randomFolderName = uniqid('trabajador_');
                        $my_dir = $rutaArchivo.'/'.$randomFolderName;
                        if(!is_dir($my_dir)){
                            mkdir($my_dir);
                            //echo "Se hizo el directorio " . $my_dir;
                            $imageFile = $request->file('file');
                            $imageName = Str::uuid() . "." . $imageFile->extension();
                            $imageServer = Image::make($imageFile);
                            $imageServer->fit(1000,1000);
    
                            $imagePath = public_path('uploads/contratista/'.$contractor->folderName.'/'.$randomFolderName) . '/' . $imageName;
    
                            $imageServer->save($imagePath);
                            return response()->json([
                                'folderName' => $randomFolderName,
                                'imagen' => $imageName
                            ]);
                        }else{
                            return response()->json([
                                'message' => "Falló al crear directorio"
                            ]);
                            
                        }
                        
                    }
                }
            } else {
                return response()->json([
                    'message' => "El directorio no existe."
                ]);
            }
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