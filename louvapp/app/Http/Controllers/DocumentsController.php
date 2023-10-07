<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DocumentsController extends Controller
{

public function validateDocuments(Request $request)
{
    // Obtén los IDs de los documentos validados desde la solicitud
    //$validatedDocumentIds = $request->input('validated', []);
    $validatedDocumentIds = array_keys($request->validated);
    //dd($validatedDocumentIds);
    // Actualiza los documentos marcados como validados en la base de datos
    Documents::whereIn('id', $validatedDocumentIds)
        ->update(['validated' => true]);
    
        return redirect()->back()->with('success', 'Archivos validados exitosamente');

    // Redirecciona o muestra un mensaje de éxito
    //return redirect()->route('tu_ruta_de_redireccion')->with('success', 'Documentos validados correctamente.');
}

}
