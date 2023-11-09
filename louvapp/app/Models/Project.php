<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'idProject';
    
    protected $fillable = [
        'projectName',
        'projectImage',
        'description',
        'fechaInicio',
        'projectType',
        'squareMeterSuperficial',
        'squareMeterSotano',
        'address',
        'location',
        'state',
        'constructionSystem',
        'idUser_projectManager',
        'idUser_workManager',
        'totalScheduledCost'           
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

}
