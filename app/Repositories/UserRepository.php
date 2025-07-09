<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Message;
use Illuminate\Support\Collection;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getContactList(): ?Collection
    {
        return auth()->user()->contacts;
    }

    public function getLatestMessage(int $userId): ?Message
    {
        return Message::where(function ($query) use ($userId) {
            $query->where('sender_id', auth()->user()->id)->where('reciever_id', $userId);
        })
            ->orWhere(function ($query) use ($userId) {
                $query->where('sender_id', $userId)->where('reciever_id', auth()->user()->id);
            })
            ->latest()
            ->first();
    }

    public function contactSearch(string $searchString): ?Collection
    {
        $contacts = $this->getContactList();

        if (!$contacts) {
            return null;
        }

        return $contacts->filter(function ($contact) use ($searchString) {
            return str_contains(strtolower($contact->name), strtolower($searchString));
        });
    }

    public function getContact(int $contactId): User
    {
        return User::find($contactId);
    }
}
