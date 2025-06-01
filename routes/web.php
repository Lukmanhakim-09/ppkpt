<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanController;

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'auth']);

Route::get('/', [BeritaController::class, 'indexhome']);
Route::get('/user', [BeritaController::class, 'indexuser']);

Route::post('/user', [AduanController::class, 'store'])->name('aduan.store');

Route::get('/admin', [AdminController::class, 'index']);
