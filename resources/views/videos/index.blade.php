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


            <h1>Videos</h1>

            <a class="btn btn-small btn-success blue lighten-2" href="/videos/create">Add New</a>

            <!-- will be used to show any messages -->
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Source</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                @foreach($videos as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->source }}</td>

                        <td>
                            <!-- Dropdown Trigger -->
                            <a class='dropdown-button btn blue lighten-2' href='#' data-activates='dropdown{{ $value->id }}'>Actions</a>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown{{ $value->id }}' class='dropdown-content'>
                                <li>
                                    <a class="blue-text text-lighten-2" href="/videos/{{ $value->id }}/edit">
                                        <i class="material-icons tiny">mode_edit</i> Edit
                                    </a>
                                </li>
                                <li>
                                    {{ Form::open(array('url' => url('videos/' . $value->id), 'id'=>'video-'.$value->id.'-delete')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::close() }}
                                    <a class="blue-text text-lighten-2" href="#" onclick="$('#video-{{ $value->id }}-delete').submit()">
                                       <i class="material-icons tiny">delete</i> Delete
                                    </a>
                                </li>
                                <li>
                                    <!-- Trigger -->
                                    <a class="blue-text text-lighten-2 copy" href="#" data-clipboard-text="{{ url('/api/video/'.$value->id) }}">
                                        <i class="material-icons tiny">settings</i> Copy API
                                    </a>
                                </li>
                            </ul>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        @include('partials/js')
        <script>
            var clipboard = new Clipboard('a.copy');
            clipboard.on('success', function(e) {
                 Materialize.toast('API Url Copied', 4000)
            });
        </script>
    </body>
</html>