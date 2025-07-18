<?php

namespace App\Interfaces;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getContactList(): ?Collection;
    
    public function getLatestMessage(int $userId): ?Message;

    public function contactSearch(string $searchString): ?Collection;

    public function getContact(int $contactId): ?User;
}
