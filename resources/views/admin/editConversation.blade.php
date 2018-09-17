@extends('layouts.app')

@section('content')

@forelse($messages as $message)
<p>{{$message->Message}}</p>
<a href='{{route('editMessage', ['id'=>$message->id])}}'>Modifier</a>
<a href='{{route('delMessage', ['id'=>$message->id])}}'>Supprimer</a>

@empty

<p>Il n'y a aucun message dans cette conversation</p>

@endforelse

@endsection