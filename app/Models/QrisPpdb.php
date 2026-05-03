<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrisPpdb extends Model
{
    protected $table = 'qris_ppdb';

    protected $fillable = [
        'entitas',
        'nama',
        'gambar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }
}
