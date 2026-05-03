<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('peran')->nullable(); // misal: Wali Santri — Kelas 5 MI
            $table->string('inisial', 5)->nullable(); // huruf awal untuk avatar placeholder
            $table->string('warna_avatar')->nullable(); // misal: linear-gradient(135deg,#10b981,#059669)
            $table->text('isi');
            $table->tinyInteger('bintang')->default(5); // 1-5
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};
