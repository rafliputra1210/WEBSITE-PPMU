<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('tempat_lahir');
        $table->string('tanggal_lahir'); // Menggunakan string untuk kemudahan input manual teks
        $table->string('asal_sekolah');
        $table->enum('mendaftar_ke', ['pesantren', 'madrasah']);
        $table->string('nama_wali');
        $table->string('no_wa');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
