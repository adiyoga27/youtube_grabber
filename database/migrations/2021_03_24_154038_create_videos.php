<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {

            $table->string('videoId', 50)->primary();
            $table->string('channelId');
            $table->foreign('channelId')->references('channelId')->on('channel')->onDelete('cascade');
            
            $table->string('title', 100);
            $table->string('description', 225);
            $table->string('liveBroadcastContent', 50);
            $table->string('lowImage');
            $table->string('mediumImage');
            $table->string('highImage');
            $table->date('publishedAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
