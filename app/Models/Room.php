<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Room extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'admin_id',
        'unseen_messages'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
