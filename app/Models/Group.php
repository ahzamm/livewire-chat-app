<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public function getAllChat(){
        return GroupMessage::where('group_id', $this->id);
    }
 
    public function getAllMembers(){
        return GroupMember::where('group_id', $this->id);
    }
}
