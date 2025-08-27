<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // Nama pemberi testimoni
            $table->string('role')->nullable();        // Peran / jabatan
            $table->text('message');                    // Isi testimoni
            $table->string('image')->nullable();       // Foto opsional
            $table->enum('status', ['published', 'draft'])->default('published'); // Status
            $table->timestamps();                       // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
