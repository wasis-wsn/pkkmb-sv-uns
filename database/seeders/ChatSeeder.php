<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;

class ChatSeeder extends Seeder
{
    public function run()
    {
        Chat::create([
            'user_id' => 2, // User ID
            'unseen_messages' => 2,
            'last_sender' => 'admin',
        ]);

        Chat::create([
            'user_id' => 3, // User ID
            'unseen_messages' => 1,
            'last_sender' => 'admin',
        ]);
    }
}
