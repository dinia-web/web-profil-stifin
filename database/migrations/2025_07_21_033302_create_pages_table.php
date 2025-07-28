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
    Schema::create('pages', function (Blueprint $table) {
        $table->id();
        $table->string('title', 255);
        $table->string('slug', 255)->unique();
        $table->text('content');
        $table->string('author', 100)->nullable();
        $table->enum('status', ['draft', 'published', 'archived']);
        $table->timestamp('published_at')->nullable();
        $table->string('featured_image', 255)->nullable();
        $table->string('meta_description', 255)->nullable();
        $table->string('meta_keywords', 255)->nullable();
        $table->boolean('is_homepage')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
