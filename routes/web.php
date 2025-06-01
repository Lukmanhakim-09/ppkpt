<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'auth']);

Route::get('/user', [UserController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);


