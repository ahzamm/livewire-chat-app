<?php

namespace App\Repositories;

use App\Interfaces\MessageRepositoryInterface;
use App\Models\Message;
use Illuminate\Support\Collection;

class MessageRepository implements MessageRepositoryInterface
{
    public function getChatWithContact(int $id): Collection{
        return Message::where(function ($query) use ($id) {
            $query->where('sender_id', authUser()->id)->where('reciever_id', $id);
        })
            ->orWhere(function ($query) use ($id) {
                $query->where('sender_id', $id)->where('reciever_id', authUser()->id);
            })
            ->get();
    }

    public function store(array $data): ?Message{
        return Message::create($data);
    }

    public function delete(int $id): bool{
        return Message::find($id)->delete();
    }

    public function findMessage(int $id): Message{
        return Message::findOrFail($id);
    }
}
