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
        Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('url')->nullable();
        $table->unsignedBigInteger('parent_id')->nullable();
        $table->integer('order')->default(0);
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();

        $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
