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

//Ruta controlador de recetas, retornando el método index.
Route::get('/recetas','App\Http\Controllers\RecetaController@index')->name('recetas.index');//Alias para el metodo index

//Ruta controlador de recetas, retornando el método create.
Route::get('/recetas/create','App\Http\Controllers\RecetaController@create')->name('recetas.create');//Alias para el metodo create

//Ruta controlador de recetas, retornando el método store.
Route::post('/recetas','App\Http\Controllers\RecetaController@store')->name('recetas.store');

//Ruta controlador de recetas, retornando el método show.
Route::get('/recetas/{receta}','App\Http\Controllers\RecetaController@show')->name('recetas.show');

//Ruta controlador de recetas, retornando el método edit.
Route::get('/recetas/{receta}/edit','App\Http\Controllers\RecetaController@edit')->name('recetas.edit');

//Ruta controlador de recetas, retornando el método update.
Route::put('/recetas/{receta}','App\Http\Controllers\RecetaController@update')->name('recetas.update');

//Ruta controlador de recetas, retornando el método destroy.
Route::delete('/recetas/{receta}','App\Http\Controllers\RecetaController@destroy')->name('recetas.destroy');

Route::get('/categoria/{categoriaReceta}','App\Http\Controllers\CategoriaController@show')->name('categorias.show'); 



