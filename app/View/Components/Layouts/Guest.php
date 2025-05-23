<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Guest extends Component
{
    public string $logo;
    public string $heading;
    public string $footer;
    public function __construct()
    {
        $this->logo = 'resources/images/whatsapp.svg';
        $this->heading = match (Route::currentRouteName()) {
            'signin' => 'Sign in to your account',
            'signup' => 'Sign up to your account',
            'forget-password' => 'Enter Your Email',
            'password.reset' => 'Reset Your Password',
            default => '',
        };

        $this->footer = match (Route::currentRouteName()) {
            'signin' => 'Not a member? <a href=' . route('signup') . " wire:navigate class=\"font-semibold text-indigo-600 hover:text-indigo-500\">Signup now</a>",
            'signup' => 'Already a member? <a href=' . route('signin') . ' wire:navigate class="font-semibold text-indigo-600 hover:text-indigo-500">Signin now</a>',
            default => '',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.guest');
    }
}
