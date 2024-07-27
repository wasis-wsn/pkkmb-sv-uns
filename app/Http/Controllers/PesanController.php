<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Ilmedova\Chattle\app\Events\ChatUpdate;
use Ilmedova\Chattle\app\Events\SendMessage;

class PesanController extends Controller
{
    public function adminMessages()
    {
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        return Inertia::render('ChatView', [
            'chats' => $chats
        ]);
    }

    public function postChats(Request $request)
    {
        $chat = Chat::create([
            'unseen_messages'   => 0,
            'last_sender'       => 'customer'
        ]);
        return response()->json($chat, 200);
    }

    public function getChats()
    {
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
        return response()->json(['messages' => $messages, 'chats' => $chats], 200);
    }

    public function postMessage(Request $request)
    {
        $message = Message::create([
            'chat_id' => $request->chat_id,
            'type'    => $request->type,
            'message' => $request->message,
            'is_seen' => 0,
            'sender'  => $request->sender
        ]);
        event(new SendMessage($message));
        if($message->sender == 'customer'){
            $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
            event(new ChatUpdate($chats));
        }
        return response()->json($message, 200);
    }

    public function destroy($id)
    {
        Message::destroy($id);
        return response()->json(['message' => 'Message deleted successfully'], 200);
    }
}


