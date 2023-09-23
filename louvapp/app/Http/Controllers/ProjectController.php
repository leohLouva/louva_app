<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
        //ver lista de usuarios
        public function index()
        {
            $project = Project::all();
            return view('proyectos/listProjects', ['projects' => $project]);
        }
    
        
}
