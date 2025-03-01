<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'photo_galeri',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
