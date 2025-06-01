<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SentMessage extends Component
{
    public string $sentMessage = '';
    public string $sentAt = '';

    public function __construct($sentMessage, $sentAt)
    {
        $this->sentAt = $sentAt->diffForHumans();
        $this->sentMessage = $sentMessage;
    }

    public function render(): View|Closure|string
    {
        return view('components.sent-message');
    }
}
