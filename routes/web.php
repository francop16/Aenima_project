<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
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
//////////////////////////////////////////// Productos /////////////////////////////////////////////////////////////////
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('homeProductos');
Route::get('/productos/agregar', [App\Http\Controllers\ProductosController::class, 'create'])->name('agregarProducto');
Route::post('/productos/agregar', [App\Http\Controllers\ProductosController::class, 'store'])->name('guardarProducto');
Route::get('/productos/editar/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('editarProducto');
Route::put('/productos/editar/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('updateProducto');
Route::get('/productos/eliminar/{id}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('eliminarProducto');
