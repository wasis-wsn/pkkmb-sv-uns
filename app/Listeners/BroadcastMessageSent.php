<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastMessageSent implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::channel('chat.room.{roomId}', function ($user, $roomId) {
            // Logic untuk memeriksa apakah user boleh masuk ke room
            return $user->rooms->contains('id', $roomId);
        });
    }
}
