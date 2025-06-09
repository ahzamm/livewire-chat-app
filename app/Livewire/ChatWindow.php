<?php

namespace App\Livewire;

use App\Services\MessageService;
use Livewire\Attributes\Layout;
use Illuminate\View\View;
use Livewire\Component;

#[Layout(\App\View\Components\Layouts\App::class)]
class ChatWindow extends Component
{
    public string $contactId = '';
    public string $message = '';
    public $messages = [];
    protected $listeners = ['contact-clicked' => 'fetchMessages'];

    public function fetchMessages($contactId, MessageService $messageService): void
    {
        $this->contactId = $contactId;
        $this->messages = $messageService->getChat($this->contactId);
    }

    public function resetContact()
    {
        $this->contactId = '';
    }

    public function sendMessage(MessageService $messageService)
    {
        $data = [
            'message' => $this->message,
            'sender_id' => auth()->user()->id,
            'reciever_id' => $this->contactId,
        ];
        $messageService->store($data);
        $this->message = '';
    }

    public function render(): View
    {
        if ($this->contactId === '') {
            return view('livewire.empty-chat-window');
        }
        return view('livewire.chat-window');
    }
}
