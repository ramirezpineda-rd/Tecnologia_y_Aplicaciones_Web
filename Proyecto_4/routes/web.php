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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/hola','App\Http\Controllers\RecetaController');

//Ruta para consumir un controller llamado recetas.

//Route::get('/recetas','App\Http\Controllers\RecetaController');

//Ruta controlador de recetas, retornando el método index.
Route::get('/recetas','App\Http\Controllers\RecetaController@index')->name('recetas.index');//Alias para el metodo index

//Ruta controlador de recetas, retornando el método create.
Route::get('/recetas/create','App\Http\Controllers\RecetaController@create')->name('recetas.create');//Alias para el metodo create

//Ruta controlador de recetas, retornando el método store.
Route::post('/recetas','App\Http\Controllers\RecetaController@store')->name('recetas.store');//Alias para el metodo store

//Ruta controlador para mostrar las recetas
Route::get('/recetas', 'App\Http\Controllers\RecetaController@show')->name('recetas.show');

//Ruta controlador para mostrar las ediciones.
Route::get('/recetas', 'App\Http\Controllers\RecetaController@edit')->name('recetas.edit');

//Ruta controlador para mostrar las actualizaciones.
Route::put('/recetas', 'App\Http\Controllers\RecetaController@update')->name('recetas.update');

//Ruta controlador para eliminar recetas
Route::delete('/recetas', 'App\Http\Controllers\RecetaController@destroy')->name('recetas.destroy');

//Ruta controlador para mostrar las categorias
Route::get('/categorias', 'App\Http\Controllers\CategoriasController@show')->name('categorias.show');

//Buscador de Recetas
Route::get('/buscar', 'App\Http\Controllers\RecetaController@search')->name('buscar.show');

//Buscador de perfiles
Route::get('/perfiles','App\Http\Controllers\PerfilController@show')->name('perfiles.show');

//Buscador para editar perfiles
Route::get('/perfiles/edit','App\Http\Controllers\PerfilController@edit')->name('perfiles.edit');

//Buscador para actualizar perfiles
Route::put('/perfiles','App\Http\Controllers\PerfilController@update')->name('perfiles.update');

//Almacenar los likes de las recetas
Route::post('/recetas','App\Http\Controllers\LikesController@update')->name('likes.update');

//Route::get('/recetas/listado','Receta2Controller@index');
//Route::get('/recetas/crear', 'Receta2Controller@create');
//Route::get('/recetas/eliminar', 'Receta2Controller@destroy');




