<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewDay extends Component
{
    public string $date = '';

    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function render(): View|Closure|string
    {
        return view('components.new-day');
    }
}
