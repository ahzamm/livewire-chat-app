<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Signin extends Component
{
    public function render()
    {
        return view('livewire.auth.signin')->layout(\App\View\Components\Layouts\Guest::class);
    }
}
