<?php

namespace App\Livewire;

use App\Services\UserService;
use Illuminate\Support\Collection;
use Livewire\Component;

class ContactList extends Component
{
    /**
     * List of contacts
     * @var Collection
     */
    public Collection $contacts;

    /**
     * Search string for the contact
     * @var string
     */
    public string $contactSearch;

    /**
     * Update contact list based on the search string
     * @param \App\Services\UserService $userService
     * @return void
     */
    public function updatedContactSearch(UserService $userService)
    {
        $this->contacts = $userService->contactSearch($this->contactSearch);
    }

    /**
     * Mount method
     * @param \App\Services\UserService $userService
     * @return void
     */
    public function mount(UserService $userService)
    {
        $this->contacts = $userService->getContactList();
    }
}
