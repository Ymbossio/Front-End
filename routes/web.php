<?php

use App\Http\Controllers\ClientesController;
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

/* Route::get('/', function () {
    return view('index');
}); */
 


Route::get('Crear-registro.index', [ClientesController::class, 'index'])->name('Crear-registro.index');
Route::post('/Crear-registro', [ClientesController::class, 'store'])->name('Crear-registro.store');
Route::get('/eliminar/delete/{id}', [ClientesController::class, 'destroy'])->name('eliminar.delete');
Route::post('/Actualizar/{id}', [ClientesController::class, 'update'])->name('Actualizar.update');





