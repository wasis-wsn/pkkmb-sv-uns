<?php

namespace App\Http\Controllers;

use App\Events\ChatUpdate;
use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function adminMessages(Request $request)
    {
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        return response()->json($chats, 200);
    }

    public function createChat(Request $request)
    {
        $user = Auth::user();
        $chat = Chat::create([
            'user_id' => $user->id,
            'unseen_messages'   => 0,
            'last_sender'       => 'customer'
        ]);
        return response()->json($chat, 200);
    }

    public function getChats(){
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        return response()->json($chats, 200);
    }

    public function getMessages(Request $request)
    {
        $messages = Message::where('chat_id', $request->chat_id)->orderBy('created_at', 'asc')->get();
        foreach($messages as $message){
            $message->is_seen = 1;
            $message->save();
        }
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        event(new ChatUpdate($chats));
        return response()->json($messages, 200);
    }

    public function postMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'sender'  => 'required|string'
        ]);

        $message = Message::create([
            'type'    => 'text',
            'message' => $request->message,
            'is_seen' => 0,
            'sender'  => $request->sender
        ]);
        event(new SendMessage($message));
        if($message->sender == 'customer'){
            $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
            event(new ChatUpdate($chats));
        }
        return response($message, 200);
    }

    public function destroy($id)
    {
        Pesan::destroy($id);
        return response()->json(['message' => 'Message deleted successfully'], 200);
    }
}

