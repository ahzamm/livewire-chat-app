<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class ContactList extends Component
{
    public Collection $contacts;
    public string $contactSearch;

    public function updatedContactSearch()
    {
        $this->contacts = auth()
            ->user()
            ->getContactList()
            ->where('users.name', 'like', '%' . $this->contactSearch . '%')
            ->get();
    }

    public function mount()
    {
        $this->contacts = auth()->user()->getContactList()->get();
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
