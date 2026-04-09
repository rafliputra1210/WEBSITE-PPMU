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
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('registration_number')->unique();
        $table->string('full_name');
        $table->string('nisn')->nullable();
        $table->enum('destination', ['pesantren', 'madrasah']);
        $table->string('phone_number');
        $table->enum('status', ['review', 'accepted', 'rejected'])->default('review');
        $table->timestamps(); // Bisa ditambahkan kolom lain seperti alamat, nama ortu, dll nantinya
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
