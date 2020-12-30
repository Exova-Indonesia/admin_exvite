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
Route::get('/tampil-modal/{id}', [App\Http\Controllers\OrdersController::class, 'tampilModal']);
//Users
Route::get('/users', [App\Http\Controllers\UserController::class, 'users']);
//Upload
Route::get('upload/blogs', [App\Http\Controllers\UploadController::class, 'upload_blogs']);
Route::get('upload/template/{templates_id}', [App\Http\Controllers\UploadController::class, 'upload_template']);
Route::get('upload/template/update/{templates_id}', [App\Http\Controllers\UploadController::class, 'view_template']);

Route::post('/template/upload-files', [App\Http\Controllers\UploadController::class, 'update_files'])->name('upload.files');
Route::post('/template/upload-data', [App\Http\Controllers\UploadController::class, 'update_data'])->name('upload.data');
Route::post('/thumbnail/upload-thumbnail', [App\Http\Controllers\UploadController::class, 'update_thumbnail'])->name('upload.thumbnail');

Route::get('/templates-list', [App\Http\Controllers\TemplatesController::class, 'view']);

Route::get('/revenue', [App\Http\controllers\RevenueControllers::class, 'data']);

//Export Data
Route::get('/orders/export', [App\Http\Controllers\OrdersController::class, 'export_excel']);
Route::get('/users/export', [App\Http\Controllers\UserController::class, 'export_excel']);
Route::get('/revenue/export', [App\Http\controllers\RevenueControllers::class, 'export_excel']);

//Import Data
Route::get('/import', [App\Http\controllers\ImportController::class, 'dataspam']);
Route::post('/import/data', [App\Http\controllers\ImportController::class, 'importdata']);

//Delete
Route::get('/delete/{id}/files', [App\Http\controllers\DeleteController::class, 'delete_files']);
Route::get('/delete/{id}/thumbnail', [App\Http\controllers\DeleteController::class, 'delete_thumbnail']);

//Users Notification
Route::post('/shoutout', [App\Http\Controllers\UserController::class, 'shoutout']);
Route::post('/suspend', [App\Http\Controllers\UserController::class, 'suspend']);

Route::get('/email', [App\Http\Controllers\UserController::class, 'email']);

Route::get('/uploads', function() {
    return view('vendor/adminlte/uploads');
});
Route::get('/chart', function() {
    return view('vendor/adminlte/chart');
});

