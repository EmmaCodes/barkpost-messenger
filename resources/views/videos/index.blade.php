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


            <h1>All the Videos</h1>

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
                        <td>Payload</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($videos as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->source }}</td>
                        <td>{{ $value->payload }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <a class="btn btn-small btn-success" href="#">Details</a>
                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>  -->
                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <!-- <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a> -->

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        @include('partials/js')
    </body>
</html>