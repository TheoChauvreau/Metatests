<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href={{ URL::asset('css/editConversation.css') }} type="text/css" rel="stylesheet">

        <title>Metatests</title>
    </head>

    <body>
    @extends('layouts.app')
    @section('content')

    <div class="container">
        <div class="row">

        <table class="centered striped">
            <thead>
                <tr>
                    <th><h1>Message</h1></th>
                    <th><h1>Bot ?</h1></th>
                    <th><h1>Actions</h1></th>
                </tr>
            </thead>
            <tbody>
    @forelse($messageS as $message)
                <tr>
                    <td>{{$message->message_sent}}</td>
                    <td><img src="https://vignette.wikia.nocookie.net/lecoeurasesraisons/images/7/7d/Croix-rouge.png/revision/latest?cb=20130205125040&path-prefix=fr" alt="False" width="30" height="32" /></td>
                    <td><a href='{{route('editMessage', ['id'=>$message->id])}}'>Modifier</a><br>
                    <a href='{{route('delMessage', ['id'=>$message->id, 'state'=>$message->bot])}}'>Supprimer</a></td>
                </tr>
    @endforeach

    @forelse($messageR as $message)
                <tr>
                    <td>{{$message->message_received}}</td>
                    <td><img class="size" src="http://www.grensregio.eu/assets/files/site/news/_galleryThumnail/goedgekeurd.png" alt="True" width="40" height="44" /></td>
                    <td><a href='{{route('editMessage', ['id'=>$message->id])}}'>Modifier</a><br>
                    <a href='{{route('delMessage', ['id'=>$message->id, 'state'=>$message->bot])}}'>Supprimer</a></td>
                </tr>
    @endforeach

    



            </tbody>
        </table>
    </div>
    </div>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>