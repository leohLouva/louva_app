<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contractor extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'idContractor';
    
    protected $fillable = [
        'contractorName',
        'rfcContractor',
        'emailContractor',
        'phoneContractor',
        'sitio_web',
        'actividad',
        'domicilioContractor',
        'codigoPostalContractor',
        'idEstado_estado',
        'idMunicipio_municipio',
        'folderName',
        'img_contractor'
    ];
}
