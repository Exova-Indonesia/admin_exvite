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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\OrdersController::class, 'dashboard']);
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'orders']);
Route::get('/orders/export', [App\Http\Controllers\OrdersController::class, 'export_excel']);
Route::get('/tampil-modal/{id}', [App\Http\Controllers\OrdersController::class, 'tampilModal']);

