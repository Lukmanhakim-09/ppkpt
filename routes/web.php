<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/user', function () {
    return view('user.home');
}); 

Route::get('/admin', function () {
    return view('admin.home');
});