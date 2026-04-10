<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel ini sudah tidak dipakai, digantikan oleh beritas table
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('body')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
