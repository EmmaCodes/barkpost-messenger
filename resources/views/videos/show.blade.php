<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BarkPost Messenger</title>

        @include('partials/css')

    </head>
    <body>
        @include('partials/nav')
        
        <div class="container">

        	<h1>Showing {{ $video->name }}</h1>

		    <div class="row">
		        {{ $video->description }}
		    </div>

		    <div class="row">
		        {{ $video->video_type }}
		    </div>

		    <div class="row">
		        {{ $video->source }}
		    </div>

		    <div class="row">
		        {{ $video->payload }}
		    </div>

        </div>

        @include('partials/js')

    </body>
</html>