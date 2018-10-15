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
                <form action="{{route('send_propMessage')}}" method='POST' id = 'form'>
                <p>
                    <div class="col s6 push-s3">
                        <div class="input-field" id='add'>
                            {{csrf_field()}}
                            <textarea placeholder="Ajouter une proposition de message" style="font-size: 20px;" name='message' form='form' required></textarea>
                        </div>
                        <div class="col s6 push-s4">
                            <label id="monlabel">
                            <input type ='checkbox' name='isBot' checked disable/>
                            <span style="font-size: 20px;">Bot ?</span>
                            </label>
                            <input type='hidden' name='id' value='{{$id}}'><br>
                            <button class="waves-effect waves-light btn" type='submit'>Valider</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <p>
                                <button id="addButton">Ajouter une proposition</button>
                            </p>
        </div>
    </div>

        @endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
        $( document ).ready(function() {
               $("#addButton").click(function(){
                   console.log("Lyund")
                   input = document.createElement('textarea')
                   input.setAttribute("placeholder", "Ajouter une autre proposition de message")
                   input.setAttribute("style", "font-size: 20px;")
                   input.setAttribute("name", "message")
                   input.setAttribute("form", "form")
                   input.setAttribute("required", "")
                   $('#add').append(input)
                            });
                    });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>
</html>