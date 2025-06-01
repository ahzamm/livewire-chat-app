<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

// #[\Livewire\Attributes\Title('chat-window')]
#[Layout(\App\View\Components\Layouts\App::class)]
class ChatWindow extends Component
{
    public string $contactId = '';
    public Collection $messages;
    protected $listeners = ['contact-clicked'=>'fetchMessages'];

    // #[On('contact-clicked')]
    public function fetchMessages($contactId){
        dd($contactId);
    }

    public function mount(): void
    {
        $this->messages = Message::getAllChat($this->contactId);
    }

    public function render(): View
    {
        return view('livewire.chat-window');
    }
}
