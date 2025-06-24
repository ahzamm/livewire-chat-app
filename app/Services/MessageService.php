<?php

namespace App\Services;

use App\Interfaces\MessageRepositoryInterface;
use App\Models\Message;

class MessageService
{
    public function __construct(protected MessageRepositoryInterface $messageRepository) {}


    /**
     * Store the new message
     * @param array $data
     * @return Message|null
     */
    public function store(array $data): Message
    {
        return $this->messageRepository->store($data);
    }

    /**
     * Delete the message
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->messageRepository->delete($id);
    }

    /**
     * Fetch the chat between logedin and the provided contact
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getChat(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return $this->messageRepository->getChatWithContact($id);
    }

    /**
     * Find the message
     * @param int $id
     * @return Message|null
     */
    public function findMessage(int $id): Message
    {
        return $this->messageRepository->findMessage($id);
    }
}
