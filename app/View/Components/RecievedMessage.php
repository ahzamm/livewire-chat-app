<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecievedMessage extends Component
{
    public string $contactName = '';
    public string $recievedMessage = '';
    public string $recievedAt = '';

    public function __construct($contactName, $recievedMessage, $recievedAt)
    {
        $this->contactName = $contactName;
        $this->recievedAt = $recievedAt->diffForHumans();
        $this->recievedMessage = $recievedMessage;
    }

    public function render(): View|Closure|string
    {
        return view('components.recieved-message');
    }
}
