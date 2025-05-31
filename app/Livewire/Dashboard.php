<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout(\App\View\Components\Layouts\App::class)]
class Dashboard extends Component
{
    public string $userId = '';
    public Collection $messages;

    public function mount(): void
    {
        $this->messages = Message::getAllChat($this->userId);
    }

    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
