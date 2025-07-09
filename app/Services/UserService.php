<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(protected UserRepositoryInterface $userRepository) {}

    public function getContactList(): Collection
    {
        return $this->userRepository->getContactList();
    }

    public function getLatestMessage(int $id): Message
    {
        return $this->userRepository->getLatestMessage($id);
    }
    
    public function contactSearch(string $searchString): Collection
    {
        return $this->userRepository->contactSearch($searchString);
    }
   
    public function getContact(int $contactId): User
    {
        return $this->userRepository->getContact($contactId);
    }
}
