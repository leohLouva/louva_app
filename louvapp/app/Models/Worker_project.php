<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker_project extends Model
{
    use HasFactory;
    protected $table = 'proyecto_empresa';
    protected $primaryKey = 'idProject_contractor';
    public $timestamps = false;
    
    protected $fillable = [
        'idContractor_project',
        'idProyecto'
    ];
}
