<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'judul_materi',
        'deskripsi_materi',
        'isi_materi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
