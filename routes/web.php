<?php

use Illuminate\Support\Facades\Route;

Route::get('/signin', \App\Livewire\Auth\Signin::class)->name('signin');
Route::get('/signup', \App\Livewire\Auth\Signup::class)->name('signup');
Route::get('/forget-password', \App\Livewire\Auth\ForgetPassword::class)->name('forget-password');
Route::get('/reset-password/{token}', \App\Livewire\Auth\ResetPassword::class)->name('password.reset');

Route::middleware(\App\Http\Middleware\Authenticate::class)->group(function () {
    Route::get('/', \App\Livewire\ChatWindow::class)->name('chat-window');
    Route::post('/signout', \App\Livewire\Auth\Signout::class)->name('signout');
});
