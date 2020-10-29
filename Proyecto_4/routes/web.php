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

//Route::get('/hola','App\Http\Controllers\RecetaController');

//Ruta para consumir un controller llamado recetas.

//Route::get('/recetas','App\Http\Controllers\RecetaController');

//Ruta controlador de recetas, retornando el método index.
Route::get('/recetas','App\Http\Controllers\Receta2Controller@index')->name('recetas.index');//Alias para el metodo index

//Ruta controlador de recetas, retornando el método create.
Route::get('/recetas/create','App\Http\Controllers\Receta2Controller@create')->name('recetas.create');//Alias para el metodo create

//Ruta controlador de recetas, retornando el método store.
Route::post('/recetas','App\Http\Controllers\Receta2Controller@store')->name('recetas.store');//Alias para el metodo create


//Route::get('/recetas/listado','Receta2Controller@index');
//Route::get('/recetas/crear', 'Receta2Controller@create');
//Route::get('/recetas/eliminar', 'Receta2Controller@destroy');




