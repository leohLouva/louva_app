<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $primaryKey = 'idUser_register';
    
    protected $fillable = [
        'idContractor_contractors',
        'idProject_user',
        'idJob_jobs',
        'idType_user_type',
        'userName',
        'password',
        'email',
        'isDisable',
        'name',
        'lastName',
        'rfc',
        'personalPhone',
        'emergencyPhone',
        'imgWorker',
    ];
}
