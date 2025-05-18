<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/signin', \App\Livewire\Auth\Signin::class)->name('signin');
Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('signup');
Route::get('/forget-password', [\App\Http\Controllers\AuthController::class, 'forgetPassword'])->name('forget-password');