<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Route;

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
    Route::get('proyectos/agregar-proyecto', [App\Http\Controllers\ProjectController::class, 'verAgregarProyecto'])->name('agregar-proyecto.verAgregarProyecto');

    Route::post('/addingProject', [App\Http\Controllers\ProjectController::class, 'store']);
    Route::get('/proyectos/editar-proyecto/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('editar-proyecto.show');
    Route::post('/proyectos/editando-proyecto/{id}',[App\Http\Controllers\ProjectController::class,'update'])->name('editando-proyecto.update');
    Route::get('/municipios/{estadoId}', [App\Http\Controllers\MunicipioController::class,'obtenerMunicipiosPorEstado']);
    /***CONTRATISTAS */
    Route::get('contratista/lista-contratista', [App\Http\Controllers\ContractorController::class, 'index'])->name('lista-contratistas.index');
    Route::get('contratista/agregar-contratista', [App\Http\Controllers\ContractorController::class, 'verAgregarContratista'])->name('agregar-contratista.verAgregarContratista');
    Route::post('/addingContractor', [App\Http\Controllers\ContractorController::class, 'store']);

    /***FUERZA DE TRABAJO */
    Route::get('fuerza-trabajo/lista-trabajadores', [App\Http\Controllers\WorkerController::class, 'index'])->name('lista-trabajadores.index');
    Route::get('fuerza-trabajo/credenciales-trabajadores', [App\Http\Controllers\WorkerController::class, 'indexC'])->name('credenciales-trabajadores.indexC');
    Route::get('fuerza-trabajo/editar-trabajador/{idWorker}', [App\Http\Controllers\WorkerController::class, 'show'])->name('fuerza-trabajo.editar-trabajador.show');
    Route::get('fuerza-trabajo/agregar-trabajador', [App\Http\Controllers\WorkerController::class, 'verAgregarTrabajador'])->name('agregar-trabajador.verAgregarTrabajador');
    Route::post('/addingWorker',[App\Http\Controllers\WorkerController::class,'store']);
    Route::post('/fuerza-trabajo/editar-trabajador/editing/{idWorker}',[App\Http\Controllers\WorkerController::class,'update'])->name('profile.update');

    Route::post('/validar-documentos', [App\Http\Controllers\DocumentsController::class, 'validateDocuments'])->name('validateDocuments');
    
    


    //IMAGENES
    //almacenar imagen de usuario
    Route::post('/image', [App\Http\Controllers\ImageController::class, 'storeUser'])->name('imagenes.storeUser');
    Route::post('/image', [App\Http\Controllers\ImageController::class, 'store'])->name('imagenes.store');
    Route::post('/image/projectImage', [App\Http\Controllers\ImageController::class, 'storeProject'])->name('imagenes.storeProject');
    Route::post('/image/contractor', [App\Http\Controllers\ImageController::class, 'storeContractor'])->name('imagenes.storeContractor');
    Route::post('/image/worker', [App\Http\Controllers\ImageController::class, 'storeImgProfileWorker'])->name('imagenes.storeImgProfileWorker');
    //Subir documentos
    Route::post('/pdfs', [App\Http\Controllers\WorkerController::class, 'storeDocuments']);
    //eliminarArchivo
    Route::delete('/eliminar-archivo/{id}',  [App\Http\Controllers\WorkerController::class, 'eliminar'])->name('eliminarArchivo');

});
