<?php

use Illuminate\Support\Facades\Broadcast;
use App\Services\MessageService;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('one_to_one_chat.{id}', function ($user, $id) {
    $messageService = app(MessageService::class);
    return (int) $user->id === $messageService->findMessage((int) $id)->reciever_id;
});
