<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Descriptive name of the video');
            $table->string('description')->comment('Description of what the video is');
            $table->string('video_type_id')
                ->foreign('user_id')
                ->references('id')->on('video_types')
                ->onDelete('cascade');
            $table->string('source')->unique()->comment('Original source of video');
            $table->string('payload_location')->comment('Payload URL sent to messenger');
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
        Schema::drop('videos');
    }
}
