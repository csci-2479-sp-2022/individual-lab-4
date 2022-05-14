<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_video_game', function (Blueprint $table){
            $table->primary(['category_id', 'video_game_id']);
            $table->timestamps();
            $table->foreignId('video_game_id')->constrained();
            $table->foreignId('category_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_video_game');
    }
};