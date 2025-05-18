<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/signin', [\App\Http\Controllers\AuthController::class, 'singin'])->name('signin');
Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('signup');
Route::get('/forget-password', [\App\Http\Controllers\AuthController::class, 'forgetPassword'])->name('forget-password');