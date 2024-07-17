<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'Dokumentasi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'photo_dokum',
        'judul_dokum',
        'acara_dokum',
        'deskripsi_dokum',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
