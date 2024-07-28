<?php

namespace App\Events;

use App\Models\Room;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class RoomSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $room;
  
    public function __construct($room)
    {
        $this->room = $room;
    }
  
    public function broadcastOn()
    {
        return ['room'];
    }
  
    public function broadcastAs()
    {
        return 'chats';
    }
}