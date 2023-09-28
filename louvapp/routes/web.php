<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(); 

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('home'); });
    Route::get('/home', function () { return view('home');});

    //usuarios
    Route::get('usuarios/agregar-usuario', function () { return view('usuarios/agregar-usuario');})->name('agregar-usuario.verAgregarUsuario');    
    //guardar usuario
    Route::post('/addingUser', [App\Http\Controllers\UserController::class, 'store']);
    //almacenar imagen de usuario
    Route::post('/image', [App\Http\Controllers\ImageController::class, 'store'])->name('imagenes.store');
    //ver lista de usuarios
    Route::get('usuarios/lista-usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('lista-usuarios.index');
    //ver usuario
    Route::get('/editar-usuario/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('editar-usuario.show');
    //Editar usuario
    Route::post('editando-usuario/{user}',[App\Http\Controllers\UserController::class,'update'])->name('profile.update');
    //Cerrar sessipon
    Route::post('auth/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

    /****PROYECTOS****/
    //Ver Proyectos
    Route::get('proyectos/lista-proyectos', [App\Http\Controllers\ProjectController::class, 'index'])->name('lista-proyectos.index');
    //Ver agregar proyecto
    Route::get('proyectos/agregar-proyecto', function () {  return view('proyectos/agregar-proyecto');})->name('agregar-proyecto.verAgregarProyecto');   
    //guardar proyecto
    Route::post('/image', [App\Http\Controllers\ImageController::class, 'store'])->name('imagenes.store');
    Route::post('/addingProject', [App\Http\Controllers\ProjectController::class, 'store']);
    Route::get('/editar-proyecto/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('editar-proyecto.show');
    Route::post('editingProject/{id}',[App\Http\Controllers\ProjectController::class,'update'])->name('profile.update');
    
    /***CONTRATISTAS */
     //Ver Contratistas
    Route::get('contratista/lista-contratista', [App\Http\Controllers\ContractorController::class, 'index'])->name('lista-contratistas.index');
    Route::get('contratista/agregar-contratista', [App\Http\Controllers\ContractorController::class, 'verAgregarContratista'])->name('agregar-contratista.verAgregarContratista');
    Route::post('/addingContractor', [App\Http\Controllers\ContractorController::class, 'store']);
    

});
