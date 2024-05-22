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

        Schema::create('game', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('game_word_id');
            $table->foreign('game_word_id')->references('id')->on('words')->onDelete('cascade');
            $table->date('game-date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game');
    }
};
