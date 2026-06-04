<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuKas extends Model
{
    protected $table = 'buku_kas';

    protected $fillable = [
        'tanggal',
        'tipe',
        'nominal',
        'kategori',
        'keterangan',
        'donatur_id',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke Donatur (jika tipe = pemasukan berasal dari Donatur).
     */
    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id');
    }
}
