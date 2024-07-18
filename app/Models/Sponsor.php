<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_sponsor',
        'logo_sponsor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
