<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
// use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SingleContact extends Component
{
    public string $avatar = '';
    public string $contactName = '';
    public string $lastMessageTime = '';
    public string $lastMessage = '';

    public function __construct(public mixed $contact)
    {
        $this->avatar = $contact->getFirstMedia() ?? asset(config('constant.default_image'));
        $this->contactName = $contact->name;
        $this->lastMessageTime = auth()->user()->getLatestMessage($contact->id)->created_at->diffForHumans();
        $this->lastMessage = auth()->user()->getLatestMessage($contact->id)->message;
    }

    public function render(): View|Closure|string
    {
        return view('components.single-contact');
    }
}
