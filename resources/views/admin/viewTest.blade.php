<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Metatests</title>
    </head>

    <body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col s6">
                <table>
                    <tbody>
                        @foreach($tests as $test)
                            <tr>
                                <td>Test n°{{$index++}}</td>
                                <td>{{$test++}}</td>
                                <td>{{$response++}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>