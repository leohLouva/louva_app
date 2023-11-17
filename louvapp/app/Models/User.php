<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'idUser';
    
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
        'curp',
        'nss',
        'personalPhone',
        'emergencyPhone',
        'blodType',
        'chronicDiseases',
        'alergies',
        'imgWorker',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
