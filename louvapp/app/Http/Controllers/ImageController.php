<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManagerStatic as Image;


class ImageController extends Controller
{

    public function store(Request $request)
    {
        // Obtén la imagen del formulario
        $imageFile = $request->file('file');

        // Verifica si se subió una imagen válida
        if ($imageFile->isValid()) {

            $imageName = Str::uuid() . "." . $imageFile->extension();
            $imagePath = public_path('assets/images/users/louva_usuarios') . "/" . $imageName;
            //File::makeDirectory($imagePath, 0777, true, true);
            $image = Image::make($imageFile);
            $image->resize(1000, 1000);

            // Guarda la imagen en la ubicación especificada
            $image->save($imagePath);

            // Devuelve la respuesta JSON con el nombre de la imagen guardada
            return response()->json(['imagen' => $imageName]);
        } else {
            // Maneja el caso en el que no se subió una imagen válida
            return response()->json(['error' => 'No se ha subido una imagen válida.']);
        }
    }

}