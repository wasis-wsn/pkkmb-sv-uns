<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'message',
        'sender',
        'user_id',
        'is_seen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
