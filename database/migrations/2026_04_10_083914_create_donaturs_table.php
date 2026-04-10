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
    Schema::create('donaturs', function (Blueprint $table) {
        $table->id();
        $table->string('nama_donatur');
        $table->decimal('jumlah_donasi', 15, 2);
        $table->text('pesan')->nullable();
        $table->date('tanggal_donasi');
        $table->enum('status', ['pending', 'berhasil'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaturs');
    }
};
