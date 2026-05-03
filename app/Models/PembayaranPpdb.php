<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranPpdb extends Model
{
    protected $table = 'pembayaran_ppdb';

    protected $fillable = [
        'entitas',
        'nama_bank',
        'no_rekening',
        'atas_nama',
        'keterangan',
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
