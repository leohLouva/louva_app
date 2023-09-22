<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get('/home', function () {  
        return view('home');
    });
    Route::get('/lista-usuarios', function () {  
        return view('/listUsers');
    });
    //usurios
    Route::get('/agregar-usuario', function () {  
        return view('/addUser');
    });    
    Route::post('/addingUser', [App\Http\Controllers\UserController::class, 'store']);
    Route::post('/imagenes', [App\Http\Controllers\ImageController::class, 'store'])->name('imagenes.store');

    //Cerrar sessipon
    Route::post('auth/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

 

    

});


// Rutas de autenticación
