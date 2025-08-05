<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->foreignId('category_id')->nullable()->constrained('gallery_categories')->onDelete('set null');
            $table->foreignId('album_id')->nullable()->constrained('albums')->onDelete('set null');
            $table->string('uploader', 100)->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->date('taken_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->foreignId('category_id')->constrained('gallery_categories')->onDelete('cascade');
            $table->foreignId('album_id')->constrained('albums')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};

