<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'mendaftar_ke',
        'nama_wali',
        'no_wa',
    ];
}
