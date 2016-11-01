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

        	<h1>Edit a Video</h1>

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

			
			{{ Form::model($video, array('route' => array('videos.update', $video->id), 'method' => 'PUT', 'class' => 'barkpost-form')) }}

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
				        {{ Form::label('video_type_id', 'Video Type') }}
				        {{ Form::select('video_type_id', $video_types, array('class' => 'barkpost-select-label' )) }}
			        </div>
			    </div>

			    <div class="row">
			    	<div class="input-field col s12">
				        {{ Form::label('source', 'Source URL') }}
				        {{ Form::text('source', null) }}
			        </div>
			    </div>

			    {{ Form::submit('Save Video', array('class' => 'btn btn-primary blue lighten-2')) }}

			{{ Form::close() }}

			<!-- delete the video (uses the destroy method DESTROY /videos/{id} -->
            <!-- we will add this later since its a little more complicated than the other two buttons -->
            {{ Form::open(array('url' => 'videos/' . $video->id)) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Video') }}
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