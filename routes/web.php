<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/signin', \App\Livewire\Auth\Signin::class)->name('signin');
Route::get('/signup', \App\Livewire\Auth\Signup::class)->name('signup');
Route::get('/forget-password', \App\Livewire\Auth\ForgetPassword::class)->name('forget-password');