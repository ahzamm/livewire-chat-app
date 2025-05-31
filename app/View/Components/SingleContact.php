<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleContact extends Component
{
    public string $contactName = '';
    public string $lastMessageTime = '';
    public string $lastMessage = '';

    public function __construct($contactName, $lastMessageTime, $lastMessage)
    {
        $this->contactName = $contactName;
        $this->lastMessageTime = $lastMessageTime;
        $this->lastMessage = $lastMessage;
    }

    public function render(): View|Closure|string
    {
        return view('components.single-contact');
    }
}
