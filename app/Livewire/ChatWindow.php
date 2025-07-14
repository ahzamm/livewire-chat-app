<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Services\MessageService;
use App\Services\UserService;
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
     * Current contact name
     * @var string
     */
    public string $contactName = '';

    /**
     * Current contact avatar
     * @var string
     */
    public string $contactAvatar = '';

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
    public function fetchMessages($contactId, UserService $userService, MessageService $messageService): void
    {
        $this->contactId = $contactId;
        $this->contactName = $userService->getContact((int) $this->contactId)->name;
        $this->contactAvatar = $userService->getContact((int) $this->contactId)->getFirstMedia() ?? asset(config('constant.default_image'));
        $this->messages = $messageService->getChat($this->contactId);

        $this->dispatch('scrollToBottom');
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
            'sender_id' => authUser()->id,
            'reciever_id' => $this->contactId,
        ];
        $newMessage = $messageService->store($data);

        broadcast(new MessageSent($newMessage));

        $this->messages[] = $newMessage;
        $this->message = '';

        $this->dispatch('scrollToBottom');
        $this->dispatch('messageUpdated', $this->contactId)->to(ContactItem::class);
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

        $this->dispatch('scrollToBottom');
        $this->dispatch('messageUpdated', $this->contactId)->to(ContactItem::class);
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
