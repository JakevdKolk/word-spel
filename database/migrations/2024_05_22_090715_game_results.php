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
        Schema::create('game_results', function (Blueprint $table) {
            //columns
            $table->id();
            $table->unsignedBigInteger('game_results_game_id');
            $table->boolean('winner');
            $table->timestamps();

            //foreign key relations
            $table->foreign('game_results_game_id')->references('id')->on('game')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
