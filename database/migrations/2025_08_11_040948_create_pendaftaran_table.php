<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pendaftaran', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('whatsapp');
        $table->string('email')->nullable();
        $table->string('paket');
        $table->string('lokasi')->nullable();
        $table->string('sidik_jari')->nullable(); // untuk file upload
        $table->text('catatan')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
