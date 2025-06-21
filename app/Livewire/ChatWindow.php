<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Services\MessageService;
use Livewire\Attributes\Layout;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\On;

#[Layout(\App\View\Components\Layouts\App::class)]
class ChatWindow extends Component
{
    public string $contactId = '';
    public string $message = '';
    public $messages = [];
    protected $listeners = [
        'contact-clicked' => 'fetchMessages',
        'recieveMessage' => 'recieveMessage',];

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
        // dd($this->contactId);
        $data = [
            'message' => $this->message,
            'sender_id' => auth()->user()->id,
            'reciever_id' => $this->contactId,
        ];
        $newMessage = $messageService->store($data);

        broadcast(new MessageSent($newMessage));

        $this->messages[] = $newMessage;
        $this->message = '';
    }

    public function recieveMessage($recievedMessage)
    {
        dd($recievedMessage);
    }

    public function render(): View
    {
        if ($this->contactId === '') {
            return view('livewire.empty-chat-window');
        }
        return view('livewire.chat-window');
    }
}
