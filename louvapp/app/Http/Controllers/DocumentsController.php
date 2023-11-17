<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DocumentsController extends Controller
{

public function validateDocuments(Request $request)
{
    dd($request->all());
    $validatedDocumentIds = array_keys($request->validated);
    Documents::whereIn('id', $validatedDocumentIds)
        ->update(['validated' => true]);
        return redirect()->back()->with('success', 'Archivos validados exitosamente');
}

}
