<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;


Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'auth']);
Route::get('/logout', [loginController::class, 'logout']);

Route::get('/', [BeritaController::class, 'indexhome']);

Route::get('/user', [BeritaController::class, 'indexuser'])->name('user.home');


Route::post('/user', [AduanController::class, 'store'])->name('aduan.store');

Route::get('/editprofil', [UserController::class, 'index']);
Route::post('/editprofil', [UserController::class, 'update'])->name('editprofil.update');

Route::get('/admin', [BeritaController::class, 'indexadmin'])->name('admin.home');

Route::get('/admin/kelolapengguna', [AdminController::class, 'index'])->name('admin.kelolapengguna');
