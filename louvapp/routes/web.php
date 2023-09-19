<?php

use Illuminate\Support\Facades\Auth;
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




// Rutas de autenticación
Auth::routes();
Route::middleware(['auth'])->group(function () {
    // Rutas protegidas
    //Ruta principal
    Route::get('/', function () {
        return view('home');
    });
});



/*

 Vistas de usuarios
Route::get('/user/listUser', [App\Http\Controllers\UserController::class, 'listUser']);
Route::get('/user/addUser', [App\Http\Controllers\UserController::class, 'viewAddUser']);

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
//vistas para Fuerza de trabajo
// Otras rutas de tu aplicación

 */

