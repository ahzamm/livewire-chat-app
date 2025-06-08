<?php

namespace App\Livewire;

use App\Services\UserService;
use Illuminate\Support\Collection;
use Livewire\Component;

class ContactList extends Component
{
    public Collection $contacts;
    public string $contactSearch;

    public function updatedContactSearch(UserService $userService)
    {
        $this->contacts = $userService->contactSearch($this->contactSearch);
    }

    public function mount(UserService $userService)
    {
        $this->contacts = $userService->getContactList();
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
