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

   

    public function storeUser(Request $request)
    {

        $imageFile = $request->file('file');
        $imageName = Str::uuid() . "." . $imageFile->extension();
        $imageServer = Image::make($imageFile);
        $imageServer->fit(1000,1000);
        //$directory = "uploads/".$request->typeOfView;
        $imagePath = public_path('uploads/user_profile') . '/' . $imageName;
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
        $my_dir = 'uploads/contractors';

        $imagePath = public_path($my_dir) . '/' . $imageName;
        $imageServer->save($imagePath);
        return response()->json([
            'status' => 'Success',
            'message' => 'Imágen almacenada con éxito',
            'folderName' => $randomFolderName,
            'flImage' => $imageName,
            'imagen' => $imageName,
            'redirect' => '0'
        ]);
        
        return response()->json([
            'imagen' => $imageName
        ]);

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