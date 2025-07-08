<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guard = "admin";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password', // nyembunyiin password dalam respons API
        'remember_token',
    ];


    protected $casts = [
        'password' => 'hashed', // password ter hash
    ];
    // public function messages()
    // {
    //     return $this->hasMany(Message::class, 'sender_id')->where('sender_type', self::class);
    // }
}
