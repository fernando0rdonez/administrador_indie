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


Route::get('/', [App\Http\Controllers\PedidoController::class, 'index'])->name('index');


Auth::routes();

Route::get('/reata', [App\Http\Controllers\ReataController::class, 'index'])->name('reata.index');
Route::post('/reata', [App\Http\Controllers\ReataController::class,'create'])->name('reata.create');
Route::get('/reata/nuevo', [App\Http\Controllers\ReataController::class,'new'])->name('reata.new');
Route::get('/reata/{reata}', [App\Http\Controllers\ReataController::class,'show'])->name('reata.show');
Route::post('/reata/{reata}', [App\Http\Controllers\ReataController::class,'edit'])->name('reata.edit');


Route::get('/modelo', [App\Http\Controllers\ModeloController::class, 'index'])->name('modelo.index');
Route::post('/modelo', [App\Http\Controllers\ModeloController::class,'create'])->name('modelo.create');
Route::get('/modelo/nuevo', [App\Http\Controllers\ModeloController::class,'new'])->name('modelo.new');
Route::get('/modelo/search', [App\Http\Controllers\ModeloController::class,'search'])->name('modelo.search');
Route::get('/modelo/{modelo}', [App\Http\Controllers\ModeloController::class,'show'])->name('modelo.show');
Route::post('/modelo/{modelo}', [App\Http\Controllers\ModeloController::class,'edit'])->name('modelo.edit');


Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
Route::post('/cliente', [App\Http\Controllers\ClienteController::class,'create'])->name('cliente.create');
Route::get('/cliente/nuevo', [App\Http\Controllers\ClienteController::class,'new'])->name('cliente.new');
Route::get('/cliente/search', [App\Http\Controllers\ClienteController::class,'search'])->name('cliente.search');
Route::get('/cliente/{cliente}', [App\Http\Controllers\ClienteController::class,'show'])->name('cliente.show');
Route::post('/cliente/{cliente}', [App\Http\Controllers\ClienteController::class,'edit'])->name('cliente.edit');

Route::get('/pedido', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedido.index');
Route::post('/pedido', [App\Http\Controllers\PedidoController::class,'create'])->name('pedido.create');
Route::get('/pedido/nuevo', [App\Http\Controllers\PedidoController::class,'new'])->name('pedido.new');
Route::get('/pedido/update/{pedido}', [App\Http\Controllers\PedidoController::class,'update'])->name('pedido.update');
Route::get('/pedido/{pedido}', [App\Http\Controllers\PedidoController::class,'show'])->name('pedido.show');
Route::post('/pedido/{pedido}', [App\Http\Controllers\PedidoController::class,'edit'])->name('pedido.edit');
Route::get('/pedido/{pedido}/detalles', [App\Http\Controllers\PedidoController::class,'detail'])->name('pedido.detail');

Route::get('/materiales', [App\Http\Controllers\MaterialesController::class,'materiales'])->name('pedido.materiales');
Route::get('/materiales/all', [App\Http\Controllers\MaterialesController::class,'detalle'])->name('pedido.detalle');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
