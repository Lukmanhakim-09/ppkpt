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

Route::get('/', [BeritaController::class, 'index'])->name('home');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita');
Route::get('/editprofil', [ProfilController::class, 'index']);
Route::post('/editprofil', [ProfilController::class, 'update'])->name('editprofil.update');

Route::post('/', [UserController::class, 'store'])->name('messages.store');

Route::get('/verify', [UserController::class, 'verify'])->name('verify');
Route::post('/verify', [UserController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/verify/resend', [UserController::class, 'resendOtp'])->name('verify.resend');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'berita'])->name('admin.home');
    
    Route::get('/admin/dokumen/keloladokumen', [AdminController::class, 'keloladokumen'])->name('admin.keloladokumen');
    Route::get('/admin/dokumen/tambahdokumen', [AdminController::class, 'showTambahDokumenForm'])->name('admin.tambahdokumen');
    Route::get('/admin/dokumen/editdokumen/{id}', [AdminController::class, 'showEditDokumenForm'])->name('admin.editdokumen');
    Route::put('/admin/dokumen/editdokumen/{id}', [AdminController::class, 'updateDokumen'])->name('admin.editdokumen.update');
    Route::delete('/admin/dokumen/keloladokumen/{id}', [AdminController::class, 'deleteDokumen'])->name('admin.keloladokumen.delete');
    Route::post('/admin/dokumen/tambahdokumen', [AdminController::class, 'storeDokumen'])->name('admin.keloladokumen.store');

    Route::get('/admin/pengguna/kelolapengguna', [AdminController::class, 'kelolapengguna'])->name('admin.kelolapengguna');
    Route::get('/admin/pengguna/tambahpengguna', [AdminController::class, 'showTambahPenggunaForm'])->name('admin.tambahpengguna');
    Route::get('/admin/pengguna/editpengguna/{id}', [AdminController::class, 'showEditPenggunaForm'])->name('admin.editpengguna');
    Route::put('/admin/pengguna/editpengguna/{id}', [AdminController::class, 'updatePengguna'])->name('admin.editpengguna.update');
    Route::delete('/admin/pengguna/kelolapengguna/{id}', [AdminController::class, 'deletePengguna'])->name('admin.kelolapengguna.delete');
    Route::post('/admin/pengguna/tambahpengguna', [AdminController::class, 'storePengguna'])->name('admin.kelolapengguna.store');

    Route::get('/admin/berita/kelolaberita', [AdminController::class, 'kelolaberita'])->name('admin.kelolaberita');
    Route::get('/admin/berita/tambahberita', [AdminController::class, 'showTambahBeritaForm'])->name('admin.tambahberita');
    Route::get('/admin/berita/editberita/{id}', [AdminController::class, 'showEditBeritaForm'])->name('admin.editberita');
    Route::put('/admin/berita/editberita/{id}', [AdminController::class, 'updateBerita'])->name('admin.editberita.update');
    Route::delete('/admin/berita/kelolaberita/{id}', [AdminController::class, 'deleteBerita'])->name('admin.kelolaberita.delete');
    Route::post('/admin/berita/tambahberita', [AdminController::class, 'storeBerita'])->name('admin.kelolaberita.store');
    

});

Route::middleware('auth', 'role:pelapor', 'checkStatus')->group(function () { 
    Route::get('/user', [UserController::class, 'berita'])->name('user.home');
    Route::post('/user', [UserController::class, 'storeAduan'])->name('aduan.store');
});



    