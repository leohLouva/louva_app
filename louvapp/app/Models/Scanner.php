<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanner extends Model
{
    use HasFactory;
    protected $table = 'attendences';
    protected $primaryKey = 'idAttendence';
    public $timestamps = false;
    
    protected $fillable = [
        'idUser_worker',
        'idRegister',
        'idContractor_contractors',
        'idProject_project',
        'date',
        'startTime',
        'endTime'    
    ];

    
}
