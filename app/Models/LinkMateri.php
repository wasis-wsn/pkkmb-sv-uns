<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkMateri extends Model
{
    use HasFactory;

    protected $table = 'link_materi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'judul_file',
        'link_drive',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
