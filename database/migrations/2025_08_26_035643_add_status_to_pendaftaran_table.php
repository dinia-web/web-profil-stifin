<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('pendaftaran', function (Blueprint $table) {
        $table->enum('status', ['1', '2', '3'])
              ->default('1')
              ->comment('1=baru daftar, 2=sudah tes, 3=menunggu hasil')
              ->after('sidik_jari');
    });
}

public function down()
{
    Schema::table('pendaftaran', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
