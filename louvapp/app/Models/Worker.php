<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $primaryKey = 'idWorker';
    
    protected $fillable = [
        'idJob_jobs',
        'idUser_worker',
        'idContractor_contractors',
        'name',
        'lastName',
        'rfc',
        'curp',
        'nss',
        'personalPhone',
        'emergencyPhone',
        'blodType',
        'chronicDiseases',
        'alergies',
        'status',
        'imgWorker',
        'foldeName'
    ];

}

