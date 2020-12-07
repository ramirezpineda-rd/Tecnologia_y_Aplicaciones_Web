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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Rutas de meseros
Route::get('/', [App\Http\Controllers\MeserosController::class, 'index'])->name('meseros.index');
Route::get('/meseros/create', [App\Http\Controllers\MeserosController::class, 'create'])->name('meseros.create');
Route::post('/meseros', [App\Http\Controllers\MeserosController::class, 'store'])->name('meseros.store');
Route::get('/meseros/{mesero}', [App\Http\Controllers\MeserosController::class, 'show'])->name('meseros.show');
Route::get('/meseros/edit/{mesero}', [App\Http\Controllers\MeserosController::class, 'edit'])->name('meseros.edit');
Route::put('/meseros/{mesero}', [App\Http\Controllers\MeserosController::class, 'update'])->name('meseros.update');
Route::delete('/meseros/destroy/{mesero}', [App\Http\Controllers\MeserosController::class, 'destroy'])->name('meseros.destroy');
// Rutas de mesas
Route::get('/mesas', [App\Http\Controllers\MesasController::class, 'index'])->name('mesas.index');
Route::get('/mesas/create', [App\Http\Controllers\MesasController::class, 'create'])->name('mesas.create');
Route::post('/mesas', [App\Http\Controllers\MesasController::class, 'store'])->name('mesas.store');
Route::get('/mesas/{mesa}', [App\Http\Controllers\MesasController::class, 'show'])->name('mesas.show');
Route::get('/mesas/edit/{mesa}', [App\Http\Controllers\MesasController::class, 'edit'])->name('mesas.edit');
Route::put('/mesas/{mesa}', [App\Http\Controllers\MesasController::class, 'update'])->name('mesas.update');
Route::delete('/mesas/destroy/{mesa}', [App\Http\Controllers\MesasController::class, 'destroy'])->name('mesas.destroy');


