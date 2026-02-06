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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->integer('age')->nullable();
            $table->text('bio')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique(); // ⭐ One-to-One
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
