<?php

namespace App\Models;

use Google\Service\DriveActivity\Upload;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'nama_mahasiswa',
        'room_id'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function chat(){
        return $this->hasMany(Message::class);
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class);
    }
}
