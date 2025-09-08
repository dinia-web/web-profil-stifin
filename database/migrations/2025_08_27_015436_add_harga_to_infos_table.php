<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->decimal('harga', 15, 2)->nullable()->after('isi');
            // 15 total digit, 2 digit di belakang koma, bisa disesuaikan
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn('harga');
        });
    }
};
