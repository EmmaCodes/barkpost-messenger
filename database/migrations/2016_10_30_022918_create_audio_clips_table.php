<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudioClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_clips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Descriptive name of the audio clip');
            $table->string('description')->comment('Description of what the audio is');
            $table->string('source')->unique()->comment('Original source of audio');
            $table->string('payload')->comment('Payload URL sent to messenger');
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
        Schema::drop('audio_clips');
    }
}
