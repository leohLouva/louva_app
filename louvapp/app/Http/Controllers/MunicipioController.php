<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MunicipioController extends Controller
{

    public function obtenerMunicipiosPorEstado($estadoId)
    {
        // Obtén el estado seleccionado por su ID
        $estado = Estado::find($estadoId);

        if (!$estado) {
            return response()->json(['error' => 'Estado no encontrado'], 404);
        }

        // Utiliza la relación "municipios" para obtener los municipios relacionados con el estado
        $municipios = $estado->municipios;
        
        return response()->json($municipios);
    }
}

