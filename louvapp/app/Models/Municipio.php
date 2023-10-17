<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';
    protected $primaryKey = 'idMunicipio';
    

    public function estados()
    {
        return $this->belongsToMany(Estado::class, 'estados_municipios', 'municipios_id', 'estados_id');
    }


}
