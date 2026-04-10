<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'ringkasan',
        'gambar',
        'kategori',
        'penulis',
        'tanggal_publikasi',
        'is_published',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
        'is_published'      => 'boolean',
    ];

    /**
     * Scope hanya berita yang sudah dipublish.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Auto-generate slug dari judul jika tidak diisi.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul) . '-' . now()->format('YmdHis');
            }
            if (empty($berita->tanggal_publikasi)) {
                $berita->tanggal_publikasi = today();
            }
        });
    }
}
