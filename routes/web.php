<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\ProfilController;

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'auth']);
Route::get('/logout', [loginController::class, 'logout']);

Route::get('/', [BeritaController::class, 'index']);
Route::get('/editprofil', [ProfilController::class, 'index']);
Route::post('/editprofil', [ProfilController::class, 'update'])->name('editprofil.update');

Route::get('/verify', [UserController::class, 'verify'])->name('verify');
Route::post('/verify', [UserController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/verify/resend', [UserController::class, 'resendOtp'])->name('verify.resend');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'berita'])->name('admin.home');
    Route::get('/admin/kelolapengguna', [AdminController::class, 'kelolapengguna'])->name('admin.kelolapengguna');
    Route::get('/admin/tambahpengguna', [AdminController::class, 'showTambahPenggunaForm']);
    Route::post('/admin/tambahpengguna', [AdminController::class, 'tambahpengguna'])->name('admin.tambahpengguna');
});

Route::middleware('auth', 'role:pelapor', 'checkStatus')->group(function () { 
    Route::get('/user', [UserController::class, 'berita'])->name('user.home');
    Route::post('/user', [UserController::class, 'storeAduan'])->name('aduan.store');
});



    