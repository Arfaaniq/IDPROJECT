<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    protected $table = 'verify'; // nama tabel

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'no_hp',
        'catatan',
        'tanggal_temu',
        'jam_temu',
        'layanan',
        'status',
        'gambar',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function riwayat()
    {
        return $this->hasOne(Riwayat::class, 'verify_id', 'id');
    }
}
