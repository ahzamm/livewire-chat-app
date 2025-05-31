<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class ContactList extends Component
{
    public Collection $contacts;

    public function mount()
    {
        $this->contacts = auth()->user()->getContactList()->get();
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
