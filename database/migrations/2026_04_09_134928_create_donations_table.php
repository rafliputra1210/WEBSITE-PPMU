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
    Schema::create('donations', function (Blueprint $table) {
        $table->id();
        $table->string('donatur_name');
        $table->string('phone_number')->nullable();
        $table->decimal('amount', 15, 2);
        $table->text('message')->nullable();
        $table->enum('status', ['pending', 'verified', 'failed'])->default('pending');
        $table->date('donation_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
