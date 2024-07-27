<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run()
    {
        // Messages for the first chat (user_id 11)
        Message::create([
            'chat_id' => 2, // ID chat pertama
            'type' => 'text',
            'message' => 'Hello, how can I help you?',
            'is_seen' => 1,
            'sender' => 'admin',
        ]);

        Message::create([
            'chat_id' => 2,
            'type' => 'text',
            'message' => 'I have a question about your services.',
            'is_seen' => 0,
            'sender' => 'user',
        ]);

        Message::create([
            'chat_id' => 3, // ID chat kedua
            'type' => 'text',
            'message' => 'Welcome to our support. How can I assist you today?',
            'is_seen' => 1,
            'sender' => 'admin',
        ]);

        Message::create([
            'chat_id' => 3,
            'type' => 'text',
            'message' => 'I need assistance with my account.',
            'is_seen' => 1,
            'sender' => 'user',
        ]);
    }
}