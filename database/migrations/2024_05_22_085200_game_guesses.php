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

        Schema::create('game_guesses', function (Blueprint $table) {
            //create collumns
            $table->id();
            $table->unsignedBigInteger('guess_game_id');
            $table->string('guess');
            //foreign key relations
            $table->foreign('guess_game_id')->references('id')->on('game')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_guesses');
    }
};
