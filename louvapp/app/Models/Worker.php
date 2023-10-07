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
    protected $fillable = [
        'idJob_jobs',
        'idContractor_contractors',
        'idIntern_worker',
        'name',
        'lastName',
        'nss',
        'nrp',
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

