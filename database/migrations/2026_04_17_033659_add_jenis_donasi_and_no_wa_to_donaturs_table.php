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
        Schema::table('donaturs', function (Blueprint $table) {
            $table->string('jenis_donasi')->default('nominal')->after('nama_donatur');
            $table->string('no_wa')->nullable()->after('jenis_donasi');
            $table->decimal('jumlah_donasi', 15, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donaturs', function (Blueprint $table) {
            $table->dropColumn(['jenis_donasi', 'no_wa']);
            $table->decimal('jumlah_donasi', 15, 2)->nullable(false)->change();
        });
    }
};
