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
    Schema::create('galeris', function (Blueprint $table) {
        $table->id();
        $table->enum('entitas', ['pesantren', 'madrasah']);
        $table->enum('kategori', ['potret', 'prestasi']); // Membedakan jenis galeri
        $table->string('judul_gambar')->nullable();
        $table->string('file_path');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
