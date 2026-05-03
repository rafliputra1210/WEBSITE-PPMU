<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qris_ppdb', function (Blueprint $table) {
            $table->id();
            $table->enum('entitas', ['pesantren', 'madrasah']);
            $table->string('nama')->nullable();
            $table->string('gambar');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qris_ppdb');
    }
};
