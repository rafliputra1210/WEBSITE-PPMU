<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = [
        'nama',
        'peran',
        'inisial',
        'warna_avatar',
        'isi',
        'bintang',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'bintang'   => 'integer',
    ];
}
