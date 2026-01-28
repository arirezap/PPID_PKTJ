<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi'
    ];

    // Auto generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($kategori) {
            if (empty($kategori->slug)) {
                $kategori->slug = Str::slug($kategori->nama);
            }
        });
    }

    // Relationships
    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class);
    }
}