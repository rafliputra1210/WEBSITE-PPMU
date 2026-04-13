<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'entitas',
        'kategori',
        'judul_gambar',
        'file_path',
    ];
}
