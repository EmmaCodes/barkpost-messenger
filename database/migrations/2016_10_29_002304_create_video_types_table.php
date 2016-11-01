<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Facebook, Instagram, or YouTube');
            $table->string('slug')->comment('Slug of name');
            $table->string('meta_data_property')
                ->comment('Meta Tag Property Value to scrape from source');
        });

        /* FB Graph API PHP SDK
            $request = new FacebookRequest(
          $session,
          'GET',
          '/899152720213607',
          array(
            'fields' => 'source'
          )
        );

        $response = $request->execute();
        $graphObject = $response->getGraphObject();
         */
        DB::table('video_types')->insert([
                'name' => 'Facebook',
                'slug' => 'facebook',
                'meta_data_property' => ''
            ]
        );

        DB::table('video_types')->insert([
                'name' => 'Instagram',
                'slug' => 'instagram',
                'meta_data_property' => 'og:video'
            ]
        );

        DB::table('video_types')->insert([
                'name' => 'Bark Hosted',
                'slug' => 'bark-hosted',
                'meta_data_property' => ''
            ]
        );

        /*
            Google API
            1. create project
            2. enable youtube data api
            3. credentials -> create API key
            4. not all videos allow access to fileDetails

            
         */
        // DB::table('video_types')->insert([
        //         'name' => 'YouTube'
        //     ]
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video_types');
    }
}
