<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Signin extends Component
{
    public function render()
    {
        // dd("asdf");
        return view('livewire.auth.signin')->layout(\App\View\Components\layouts\app::class);
    }
}
