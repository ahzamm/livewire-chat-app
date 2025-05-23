<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout(\App\View\Components\Layouts\App::class)]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
