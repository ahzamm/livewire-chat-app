<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    static function getAllChat($userId)
    {
        return Message::where(function ($query) use ($userId) {
            $query->where('sender_id', auth()->user()->id)->where('reciever_id', $userId);
        })
            ->orWhere(function ($query) use ($userId) {
                $query->where('sender_id', $userId)->where('reciever_id', auth()->user()->id);
            })
            ->get();
    }
}
