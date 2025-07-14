<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\UserService;

class ContactItem extends Component
{
    public string $contactId = '';
    public string $avatar = '';
    public string $contactName = '';
    public string $lastMessageTime = '';
    public string $lastMessage = '';

    protected $listeners = ['messageUpdated' => 'maybeRefresh'];

    public function mount(mixed $contact, UserService $userService)
    {
        $this->contactId = $contact->id;
        $this->avatar = $contact->getFirstMedia() ?? asset(config('constant.default_image'));
        $this->contactName = $contact->name;
        $this->lastMessageTime = $userService->getLatestMessage($contact->id)->created_at->diffForHumans();
        $this->lastMessage = $userService->getLatestMessage($contact->id)->message;
    }

    public function maybeRefresh($id)
    {
        if ($this->contactId === $id) {
            $this->refreshLastMessage();
        }
    }

    public function refreshLastMessage()
    {
        $userService = app(UserService::class);

        $this->lastMessageTime = $userService->getLatestMessage($this->contactId)->created_at->diffForHumans();
        $this->lastMessage = $userService->getLatestMessage($this->contactId)->message;
    }

    public function render()
    {
        return view('livewire.contact-item');
    }
}
