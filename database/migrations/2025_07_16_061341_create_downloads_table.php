<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->foreignId('category_id')->nullable()->constrained('download_categories')->onDelete('set null');
            $table->string('file_type', 50)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->string('uploader', 100)->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->bigInteger('download_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('downloads');
    }
};

