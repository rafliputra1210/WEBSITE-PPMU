<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $fillable = [
        'nama_donatur',
        'jenis_donasi',
        'no_wa',
        'jumlah_donasi',
        'pesan',
        'tanggal_donasi',
        'status',
    ];

    protected $casts = [
        'jumlah_donasi' => 'decimal:2',
        'tanggal_donasi' => 'date',
    ];
}
