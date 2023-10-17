<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEstado';
    
    public function municipios()
    {
        return $this->belongsToMany(Municipio::class, 'estados_municipios', 'estados_id', 'municipios_id');
    }

}
