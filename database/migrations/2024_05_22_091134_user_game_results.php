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
        Schema::create('user_game_results', function (Blueprint $table) {
            //columns
            $table->id();
            $table->unsignedBigInteger('user_game_results_user_id');
            $table->unsignedBigInteger('user_game_results_game_result_id');
            //foreign key relations
            $table->foreign('user_game_results_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_game_results_game_result_id')->references('id')->on('game_results')->onDelete('cascade');

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
