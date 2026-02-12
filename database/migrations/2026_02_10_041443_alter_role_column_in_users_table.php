<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 10)->change(); // Perbesar dari 4 ke 10 karakter
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 4)->change(); // Kembalikan ke ukuran asli
        });
    }
};