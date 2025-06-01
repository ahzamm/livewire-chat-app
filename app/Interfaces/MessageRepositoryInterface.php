<?php

namespace App\Interfaces;

use App\Models\Message;
use Illuminate\Support\Collection;

interface MessageRepositoryInterface
{
    public function getChatWithContact(int $id): Collection;

    public function store(array $data): ?Message;

    public function delete(int $id): bool;
}
