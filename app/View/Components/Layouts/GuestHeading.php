<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class GuestHeading extends Component
{
    public string $heading;
    public function __construct()
    {
        $this->heading = match (Route::currentRouteName()) {
            'signin' => 'Sign in to your account',
            'signup' => 'Sign up to your account',
            default => '',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.guest-heading');
    }
}
