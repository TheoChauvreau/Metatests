<!DOCTYPE html>
<html>
    <head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href={{ URL::asset('css/conversation.css') }} type="text/css" rel="stylesheet">

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
        <th><h1>Conversations</h1></th>
        <th><h1>Nombre de messages</h1></th>
        <th><h1>Actions</h1></th>
        </tr>
    </thead>
    <tbody>
@forelse($conversations as $conversation)
        <tr>
        <td><h2>{{$conversation->Nom}}</h2></td>
        <td><h2>{{$conversation->messageCount}}</h2></td>
        <td><a href="{{route('testConversation', ['id'=>$conversation->id])}}">Tester la conversation</a><br>
            <a href='{{route('showAddMessage', ['id'=>$conversation->id])}}'>Ajouter un message</a><br>
            <a href='{{route('editConversation', ['id'=>$conversation->id])}}'>Voir/Modifier la conversation</a><br>
            <a id="supp" href='{{route('delConversation', ['id'=>$conversation->id])}}'>Supprimer</a></td>

        </tr>

    @empty

        <p id="empty">Il n'y a aucunes conversations disponibles !</p>

    @endforelse
    </tbody>
</table>
<div class="marg-top col s6">
        <form class="center" action='/admin/addConversation' method='POST'>
            <div class="input-field col s6 push-s3">
                {{csrf_field()}}
                <input class="center color-text" type='text' name='name' id='conv' required></input>
                <label for="conv">Ajouter une conversation</label>
                <button class="waves-effect waves-light btn" type='submit'>Envoyer</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    @endsection
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>