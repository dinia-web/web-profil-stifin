<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Nama cabang
            $table->string('city');           // Kota / lokasi
            $table->string('address')->nullable(); // Alamat lengkap
            $table->string('phone')->nullable();   // Nomor telepon
            $table->string('email')->nullable();   // Email cabang
            $table->string('whatsapp')->nullable(); // WA
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
}
