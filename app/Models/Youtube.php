<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $table = 'youtube';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'judul_youtube',
        'link_youtube',
        'deskripsi_youtube',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
