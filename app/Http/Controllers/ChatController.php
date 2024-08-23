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
                ->where('unseen_messages', '>', 0)
                ->with('user') // Pastikan model Room memiliki relasi dengan User
                ->get();
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
                ->orderBy('messages.created_at', 'asc') // Urutkan berdasarkan waktu pembuatan
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
                ->orderBy('messages.created_at', 'asc') // Urutkan berdasarkan waktu pembuatan
                ->get();
        }
        return response()->json($messages);
    }     

    public function postMessage(Request $request)
    {
        $request->validate([
            'room_id' => 'nullable|exists:rooms,id', // Validate that room_id exists if provided
            'message' => 'required|string',
        ]);
    
        $user = $request->user();
        $roomId = $request->input('room_id');
        
        // Jika room_id diberikan, cari room berdasarkan room_id
        if ($roomId) {
            $room = Room::find($roomId);
        }
    
        // Simpan pesan ke dalam room
        $message = Message::create([
            'room_id' => $room->id, // Pastikan room ada
            'user_id' => $user->id,
            'message' => $request->input('message'),
        ]);
    
        // Cek apakah ini adalah pesan pertama di room ini
        $messageCount = Message::where('room_id', $room->id)->count();
    
        if ($messageCount == 1) {
            // Kirim pesan otomatis dari admin
            $adminMessage = Message::create([
                'room_id' => $room->id,
                'user_id' => $this->getDefaultAdminId(),
                'message' => "Selamat Datang di Website PKKMB SV UNS 2024 ada yang bisa dibantu? jika anda sudah mengirimkan pesan mohon menunggu dijawab oleh admin ya... Terima kasih.",
            ]);
            
            // Trigger event dengan data yang diperlukan untuk pesan admin
            broadcast(new MessageSent($adminMessage));
        }
    
        // Set is_seen menjadi 0 untuk pesan yang dikirim ke room oleh user lain
        Message::where('room_id', $room->id)
            ->where('user_id', '!=', $user->id)
            ->update(['is_seen' => 0]);
    
        // Perbarui jumlah unseen_messages di room
        $this->updateRoomUnseenMessages($room->id);
    
        // Trigger event dengan data yang diperlukan
        broadcast(new MessageSent($message));
    
        return response()->json(['message' => 'Message sent!']);
    }
    
    public function updateRoomUnseenMessages($roomId)
    {
        // Cari room berdasarkan room_id
        $room = Room::find($roomId);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        $user = auth()->user(); // Ambil pengguna yang sedang login

        // Hitung jumlah pesan dengan is_seen = 1 di room untuk pengguna lain
        $unseenMessagesCount = Message::where('room_id', $roomId)
            ->where('is_seen', 1)
            ->where('user_id', $user->id)
            ->count();

        // Perbarui unseen_messages di room
        $room->update(['unseen_messages' => $unseenMessagesCount]);

        return response()->json(['message' => 'Room unseen messages updated successfully!']);
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

}
