<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'email', // pastikan kolom username ada di sini
        'password',
    ];


    protected $hidden = [
        'password', // untuk menyembunyikan password dalam respons API
        'remember_token',
    ];


    protected $casts = [
        'password' => 'hashed', // memastikan password di-hash dengan benar
    ];

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
    // public function messages()
    // {
    //     return $this->hasMany(Message::class, 'sender_id')->where('sender_type', self::class);
    // }
    public function verifications()
    {
        return $this->hasMany(Verify::class, 'user_id', 'id');
    }

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
