<!DOCTYPE html>
<html>
    <head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href={{ URL::asset("css/addMessage.css") }} type="text/css" rel="stylesheet">

    <title>Metatests</title>
    </head>
    <body>

        @extends('layouts.app')
        @section('content')

    <div class="container">
        <div class="row">
            <div class="col s6">
                <form action="{{route('addMessage')}}" method='POST' id = 'form'>
                    <div class="col s6 push-s3">
                        <div class="input-field">
                            {{csrf_field()}}
                            <textarea placeholder="Ajouter un message" style="font-size: 20px;" name='message' form='form' required></textarea>
                        </div>
                        <div class="col s6 push-s4">
                            <label id="monlabel">
                            <input type ='checkbox' name='isBot' />
                            <span style="font-size: 20px;">Bot ?</span>
                            </label>
                            <input type='hidden' name='id' value='{{$id}}'><br>
                            <button class="waves-effect waves-light btn" type='submit'>Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        @endsection
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>