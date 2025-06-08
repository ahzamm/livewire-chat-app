<?php

namespace App\Livewire;

use App\Services\MessageService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout(\App\View\Components\Layouts\App::class)]
class ChatWindow extends Component
{
    public string $contactId = '';
    public $messages = [];
    protected $listeners = ['contact-clicked' => 'fetchMessages'];

    public function fetchMessages($contactId, MessageService $messageService): void
    {
        $this->contactId = $contactId;
        $this->messages = $messageService->getChat($this->contactId);
    }
}
