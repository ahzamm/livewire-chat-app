<?php

namespace App\View\Components;

use App\Services\UserService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleContact extends Component
{
    public string $contactId = '';
    public string $avatar = '';
    public string $contactName = '';
    public string $lastMessageTime = '';
    public string $lastMessage = '';

    public function __construct(public mixed $contact, UserService $userService)
    {
        $this->contactId = $contact->id;
        $this->avatar = $contact->getFirstMedia() ?? asset(config('constant.default_image'));
        $this->contactName = $contact->name;
        $this->lastMessageTime = $userService->getLatestMessage($contact->id)->created_at->diffForHumans();
        $this->lastMessage = $userService->getLatestMessage($contact->id)->message;
    }

    public function render(): View|Closure|string
    {
        return view('components.single-contact');
    }
}
