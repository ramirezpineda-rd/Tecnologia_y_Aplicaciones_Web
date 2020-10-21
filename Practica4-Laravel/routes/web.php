<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta para mostrar un controlador que retorna un string.

//Como se hacia en Larabel 6 y 7.
//Route::get('/','RecetaController@hola');

//Ruta como se hace en Laravel 8
route::get("/hola",'App\Http\Controller\RecetaController@hola');