<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('one_to_one_chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
