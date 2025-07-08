<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $fillable = [
        'verify_id',
        'user_id',
        'nama_lengkap',
        'email',
        'no_hp',
        'catatan',
        'tanggal_temu',
        'jam_temu',
        'layanan',
        'gambar',
        'invoice_id',
        'total_price',
        'status',
        'invoice_path',
        'admin_notes',
    ];
    public $timestamps = true;

    // Relasi ke Verify
    public function verify()
    {
        return $this->belongsTo(Verify::class, 'verify_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
