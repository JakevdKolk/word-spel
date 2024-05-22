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
        Schema::create('user_comments', function (Blueprint $table) {
            //columns
            $table->unsignedBigInteger('user_comments_user_id');
            $table->unsignedBigInteger('user_comments_comment_id');
            //foreign key relations
            $table->foreign('user_comments_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_comments_comment_id')->references('id')->on('comments')->onDelete('cascade');

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
