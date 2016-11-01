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

        	<h1>Edit an Audio Clip</h1>

			<!-- if there are creation errors, they will show here -->
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			
			{{ Form::model($audio_clip, array('route' => array('audio-clips.update', $audio_clip->id), 'method' => 'PUT')) }}

			    <div class="row">
			    	<div class="input-field col s12">
				        {{ Form::label('name', 'Name') }}
				        {{ Form::text('name', null) }}
			        </div>
			    </div>

			    <div class="row">
			    	<div class="input-field col s12">
				        {{ Form::label('description', 'Description') }}
				        {{ Form::text('description', null) }}
			        </div>
			    </div>

			    <div class="row">
			    	<div class="input-field col s12">
				        {{ Form::label('source', 'Source URL') }}
				        {{ Form::text('source', null) }}
			        </div>
			    </div>

			    {{ Form::submit('Save Audio Clip', array('class' => 'btn btn-primary blue lighten-2')) }}

			{{ Form::close() }}

			<!-- delete the video (uses the destroy method DESTROY /videos/{id} -->
            <!-- we will add this later since its a little more complicated than the other two buttons -->
            {{ Form::open(array('url' => 'audio-clips/' . $audio_clip->id)) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Audio Clip') }}
            {{ Form::close() }}

        </div>

        @include('partials/js')

        <script>
        	$(document).ready(function() {
			    $('select').material_select();
			});
        </script>

    </body>
</html>