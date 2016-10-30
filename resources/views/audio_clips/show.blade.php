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

        	<h1>Showing {{ $audio_clip->name }}</h1>

		    <div class="row">
		        {{ $audio_clip->description }}
		    </div>

		    <div class="row">
		        {{ $audio_clip->source }}
		    </div>

		    <div class="row">
		        {{ $audio_clip->payload }}
		    </div>

        </div>

        @include('partials/js')

    </body>
</html>