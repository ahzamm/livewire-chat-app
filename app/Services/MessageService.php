<?php

namespace App\Services;

use App\Interfaces\MessageRepositoryInterface;
use App\Models\Message;

class MessageService
{
    public function __construct(
        protected MessageRepositoryInterface $messageRepository
    ) {
    }

    public function store(array $data): Message
    {
        return $this->messageRepository->store($data);
    }

    public function delete(int $id): bool
    {
       return $this->messageRepository->delete($id);
    }

    public function getChat(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return $this->messageRepository->getChatWithContact($id);
    }
}