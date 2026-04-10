<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->string('ringkasan', 300)->nullable()->after('konten');
            $table->string('kategori')->default('Umum')->after('ringkasan');
            $table->string('penulis')->default('Admin Pesantren')->after('kategori');
            $table->date('tanggal_publikasi')->nullable()->after('penulis');
            $table->boolean('is_published')->default(true)->after('tanggal_publikasi');
        });
    }

    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropColumn(['ringkasan', 'kategori', 'penulis', 'tanggal_publikasi', 'is_published']);
        });
    }
};
