@extends('layouts.app')

@section('content')

@forelse($conversations as $conversation)

<p>{{$conversation->Nom}}</p>
<p>{{$conversation->messageCount}}</p>
<a href='{{route('delConversation', ['id'=>$conversation->id])}}'>Supprimer</a>
<a href='{{route('showAddMessage', ['id'=>$conversation->id])}}'>Ajouter un message</a>
<a href='{{route('editConversation', ['id'=>$conversation->id])}}'>Modifier la conversation</a>

@empty

<p>Il n'y a aucunes conversations disponibles !</p>

@endforelse

<h2>Ajouter une conversation</h2>
<form action='/admin/addConversation' method='POST'>
    {{csrf_field()}}
    <input type='text' name='name' required></input>
    <button type='submit'>Envoyer</button>
</form>

@endsection