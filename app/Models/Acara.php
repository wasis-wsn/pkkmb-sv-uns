<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'photo_dokum',
        'judul_dokum',
        'deskripsi_dokum',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
