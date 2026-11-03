<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/confirmpayment', function () {
    return view('confirmpayment');
})->name('confirmpayment');

Route::get('/modal', function () {
    return view('modal');
})->name('modal');
