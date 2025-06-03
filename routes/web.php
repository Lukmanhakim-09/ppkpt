<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\ProfilController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::post('/login', [loginController::class, 'auth']);
Route::get('/logout', [loginController::class, 'logout']);

Route::get('/', [BeritaController::class, 'index']);
Route::get('/editprofil', [ProfilController::class, 'index']);
Route::post('/editprofil', [ProfilController::class, 'update'])->name('editprofil.update');
    
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'berita'])->name('admin.home')->middleware(AdminMiddleware::class);
    Route::get('/admin/kelolapengguna', [AdminController::class, 'kelolapengguna'])->name('admin.kelolapengguna')->middleware(AdminMiddleware::class);
    Route::get('/admin/tambahpengguna', [AdminController::class, 'tambahpengguna'])->name('admin.tambahpengguna')->middleware(AdminMiddleware::class);

    Route::get('/user', [UserController::class, 'berita'])->middleware(UserMiddleware::class);
    Route::post('/user', [UserController::class, 'storeAduan'])->name('aduan.store')->middleware(UserMiddleware::class);
});
    