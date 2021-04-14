<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatMessage extends Model
{
    use HasFactory;

    public function room(){
        return $this->hasOne('App\Models\chatRoom','id','chat_room_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
