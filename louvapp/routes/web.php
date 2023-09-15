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

Route::get('/', function () {
    return view('welcome');
});
// Rutas de autenticación
Auth::routes();
/*Route::middleware(['auth'])->group(function () {
    // Rutas protegidas
    
});*/


// Otras rutas de tu aplicación
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user')->name('home');
Route::get('/user/listUser', [App\Http\Controllers\UserController::class, 'listUser'])->name('user');
Route::get('/user/addUser', [App\Http\Controllers\UserController::class, 'viewAddUser']);


