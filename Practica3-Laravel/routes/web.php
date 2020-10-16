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

//ruta para redirigir a index principal
Route::get('/principal', function () {
    return view('principal');
});

//ruta para redirigir a index secundario
/*Route::get('/secundario', function () {
    return view('secundario');
});*/

//ruta para redirigir a formulario
Route::get('/formulario', function () {
    return view('formulario');
});

//ruta para redirigir a tablas de datos, dentro de index
/*Route::get('/DataTables', function () {
    return view('DataTables');
});*/

?>
