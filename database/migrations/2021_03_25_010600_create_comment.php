<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('videoId', 50);
            $table->text('textOriginal');
            $table->string('authorChannelId', 100);
            $table->string('authorDisplayName', 50);
            $table->string('authorProfileImageUrl', 225);
            $table->string('authorChannelUrl', 225);
            $table->boolean('canRate');
            $table->string('viewerRating', 50);
            $table->integer('likeCount');
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
        Schema::dropIfExists('comment');
    }
}
