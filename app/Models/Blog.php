<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'kategori', 'deskripsi', 'gambar'];

    /**
     * Dapatkan semua komentar untuk blog ini.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
}
