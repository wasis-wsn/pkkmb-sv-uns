<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function getChats(Request $request)
    {
        $user = $request->user();

        // Jika admin, ambil semua room dengan unseen_messages > 0
        if ($user->role === 'admin') {
            $rooms = Room::where('unseen_messages', '>', 0)
                ->with('user') // Pastikan model Room memiliki relasi dengan User
                ->get();
        } else {
            // Jika bukan admin, hanya ambil room milik user
            $rooms = Room::where('user_id', $user->id)
                ->with('user') // Pastikan model Room memiliki relasi dengan User
                ->get();

            // Hitung unseen_messages untuk setiap room
            foreach ($rooms as $room) {
                $room->unseen_messages = $this->countUnseenMessages($room->id, $user->id);
                $room->save();
            }
        }
        return response()->json($rooms);
    }
    

    public function getMessages(Request $request, $roomId)
    {
        $user = $request->user();
        
        // Jika admin, ambil semua pesan dari room dan tambahkan data role dari pengguna
        if ($user->role === 'admin') {
            $messages = Message::select('messages.*', 'users.role as user_role', 'users.username as sender_name')
                ->join('users', 'messages.user_id', '=', 'users.id')
                ->where('messages.room_id', $roomId)
                ->orderBy('messages.created_at', 'asc')
                ->get();
        } else {
            // Jika bukan admin, hanya ambil pesan dari room yang milik user
            $room = Room::where('user_id', $user->id)->where('id', $roomId)->first();
            
            if (!$room) {
                return response()->json(['message' => 'Room not found'], 404);
            }
            
            // Ambil pesan dari room milik user dan tambahkan data role dari pengguna
            $messages = Message::select('messages.*', 'users.role as user_role', 'users.username as sender_name')
                ->join('users', 'messages.user_id', '=', 'users.id')
                ->where('messages.room_id', $roomId)
                ->orderBy('messages.created_at', 'asc')
                ->get();
            
            // Mark messages as seen for the current user
            $this->markMessagesAsSeen($roomId, $user->id);
        }
        return response()->json($messages);
    }     

    public function postMessage(Request $request)
    {
        $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'message' => 'required|string',
        ]);
    
        $user = $request->user();
        $roomId = $request->input('room_id');
        
        // Jika room_id diberikan, cari room berdasarkan room_id
        if ($roomId) {
            $room = Room::find($roomId);
    
            // Jika tidak ada room dengan ID tersebut, buat room baru
            if (!$room) {
                $room = Room::create([
                    'user_id' => $user->id,
                    'admin_id' => $this->getDefaultAdminId(),
                    'unseen_messages' => 0,
                ]);
            }
        } else {
            // Jika tidak ada room_id, buat room baru
            $room = Room::create([
                'user_id' => $user->id,
                'admin_id' => $this->getDefaultAdminId(),
                'unseen_messages' => 0,
            ]);
        }
    
        // Simpan pesan ke dalam room
        $message = Message::create([
            'room_id' => $room->id,
            'user_id' => $user->id,
            'message' => $request->input('message'),
        ]);
    
        // Set is_seen menjadi 0 untuk pesan yang dikirim ke room oleh user lain
        Message::where('room_id', $room->id)
            ->where('user_id', '!=', $user->id)
            ->update(['is_seen' => 0]);

        // Update unseen_messages untuk room
        // $room->unseen_messages = $this->countUnseenMessages($room->id, $user->id);
        // $room->save();
    
        // Trigger event
        broadcast(new MessageSent($message));
    
        return response()->json(['message' => 'Message sent!']);
    }
    
    public function createRoom(Request $request)
    {
        $user = $request->user();

        $room = Room::create([
            'user_id' => $user->id,
            'admin_id' => $this->getDefaultAdminId(),
            'unseen_messages' => 0,
        ]);

        return response()->json(['room_id' => $room->id]);
    }

    protected function getDefaultAdminId()
    {
        return User::where('role', 'admin')->first()->id;
    }
    
    // Menghitung jumlah pesan yang belum dilihat oleh pengguna lain
    protected function countUnseenMessages($roomId, $userId)
    {
        return Message::where('room_id', $roomId)
            ->where('user_id', '!=', $userId)
            ->where('is_seen', 1)
            ->count();
    }

    // Menandai pesan sebagai sudah dilihat
    protected function markMessagesAsSeen($roomId, $userId)
    {
        Message::where('room_id', $roomId)
            ->where('user_id', '!=', $userId)
            ->update(['is_seen' => 0]);

        // Update unseen_messages untuk room
        $room = Room::find($roomId);
        if ($room) {
            $room->unseen_messages = $this->countUnseenMessages($roomId, $userId);
            $room->save();
        }
    }
}
