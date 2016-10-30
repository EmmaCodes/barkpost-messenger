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

        	<h1>Create a Video</h1>

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

			
			{{ Form::open(array('url' => 'videos')) }}

			    <div class="row">
			        {{ Form::label('name', 'Name') }}
			        {{ Form::text('name', null) }}
			    </div>

			    <div class="row">
			        {{ Form::label('description', 'Description') }}
			        {{ Form::text('description', null) }}
			    </div>

			    <div class="row">
			        {{ Form::label('video_type_id', 'Video Type') }}
			        {{ Form::select('video_type_id', $video_types) }}
			    </div>

			    <div class="row">
			        {{ Form::label('source', 'Source URL') }}
			        {{ Form::text('source', null) }}
			    </div>

			    <div class="row">
			        {{ Form::label('payload', 'Payload URL') }}
			        {{ Form::text('payload', null) }}
			    </div>

			    {{ Form::submit('Save Video', array('class' => 'btn btn-primary')) }}

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