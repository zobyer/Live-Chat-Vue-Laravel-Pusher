<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chatRoom;
use App\Models\chatMessage;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;

class ChatController extends Controller
{
    //
    public function rooms(Request $req){
        return chatRoom::all();
    }

    public function messages(Request $req, $roomId){
        return chatMessage::where('chat_room_id', $roomId)
        ->with('user')
        ->orderBy('created_at','DESC')
        ->get();
    }

    public function newmessage(Request $req, $roomId){
        $newmessage = new chatMessage;
        $newmessage->chat_room_id = $roomId;
        $newmessage->user_id = Auth::id();
        $newmessage->message = $req->message;

        $newmessage->save();

        broadcast(new NewChatMessage($newmessage))->toOthers();

        return $newmessage;
    }

    
}
