<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('isi'); 
            $table->string('video')->nullable()->after('gambar');       // video file
            $table->string('youtube_url')->nullable()->after('video');  // YouTube URL
        });
    }

    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn(['gambar', 'video', 'youtube_url']);
        });
    }
};
