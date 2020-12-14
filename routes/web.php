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
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\OrdersController::class, 'dashboard']);
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'orders']);
Route::get('/orders/export', [App\Http\Controllers\OrdersController::class, 'export_excel']);
Route::get('/users', [App\Http\Controllers\UserController::class, 'users']);
Route::get('/tampil-modal/{id}', [App\Http\Controllers\OrdersController::class, 'tampilModal']);



Route::get('/chart', function() {
    return view('vendor/adminlte/chart');
});

