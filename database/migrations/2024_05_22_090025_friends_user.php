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
        Schema::create('friend_users', function (Blueprint $table) {
            //columns
            $table->id();
            $table->unsignedBigInteger('friend_user_id');
            //foreign key relations
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('friend_user_id')->references('id')->on('users')->onDelete('cascade');

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
