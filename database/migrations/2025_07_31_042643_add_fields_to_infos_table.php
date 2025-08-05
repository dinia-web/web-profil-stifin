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
    Schema::table('infos', function (Blueprint $table) {
        $table->string('author')->nullable()->after('gambar');
        $table->boolean('is_homepage')->default(false)->after('author');
        $table->enum('status', ['draft', 'published'])->default('draft')->after('is_homepage');
        $table->timestamp('published_at')->nullable()->after('status');
    });
}

public function down(): void
{
    Schema::table('infos', function (Blueprint $table) {
        $table->dropColumn(['author', 'is_homepage', 'status', 'published_at']);
    });
}

};
