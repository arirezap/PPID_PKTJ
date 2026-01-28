<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'konten', 'gambar', 
        'kategori_id', 'user_id', 'status', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Hubungan ke User (Penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}