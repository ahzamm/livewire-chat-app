<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Services\MessageService;
use Livewire\Attributes\Layout;
use Illuminate\View\View;
use Livewire\Component;

#[Layout(\App\View\Components\Layouts\App::class)]
class ChatWindow extends Component
{
    /**
     * Current contact id
     * @var string
     */
    public string $contactId = '';

    /**
     * Current Typed Message
     * @var string
     */
    public string $message = '';

    /**
     * All the previous Messages
     * @var array
     */
    public $messages = [];

    /**
     * Listners for this components
     * @var array
     */
    protected $listeners = [
        'contact-clicked' => 'fetchMessages',
        'recieveMessage' => 'recieveMessage',
    ];

    /**
     * Fetch chat history with current selected contact
     * @param mixed $contactId
     * @param \App\Services\MessageService $messageService
     * @return void
     */
    public function fetchMessages($contactId, MessageService $messageService): void
    {
        $this->contactId = $contactId;
        $this->messages = $messageService->getChat($this->contactId);
    }

    /**
     * Clear contactId variable upon hitting excape
     * @return void
     */
    public function resetContact()
    {
        $this->contactId = '';
    }

    /**
     * Send the message
     * @param \App\Services\MessageService $messageService
     * @return void
     */
    public function sendMessage(MessageService $messageService)
    {
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

    /**
     * Listner for the one_to_one_chat websocket channel
     * @param \App\Services\MessageService $messageService
     * @param mixed $recievedMessage
     * @return void
     */
    public function recieveMessage(MessageService $messageService, $recievedMessage)
    {
        $message = $messageService->findMessage($recievedMessage['id']);
        $this->messages[] = $message;
    }

    public function hydrate()
    {
        $this->dispatch('scrollToBottom');
    }

    /**
     * render the view
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        if ($this->contactId === '') {
            return view('livewire.empty-chat-window');
        }
        return view('livewire.chat-window');
    }
}
