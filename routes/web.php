<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);

Route::post('action-tambah', [BelajarController::class, 'actionTambah']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('product', ProductController::class);
});
