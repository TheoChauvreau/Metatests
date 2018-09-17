@extends('layouts.app')

@section('content')

<h2>Modifier un message</h2>
<form action='{{route('confirmEditMessage')}}' method='POST' id = 'form'>
    {{csrf_field()}}
    <textarea name='message' form='form'>{{$message->Message}}</textarea>
    @if($message->isBot)
    <input type ='checkbox' name='isBot' checked> Bot ?</input>
    @else
    <input type ='checkbox' name='isBot'> Bot ?</input>
    @endif
    <input type='hidden' name='id' value='{{$message->id}}'>
    <button type='submit'>Valider</button>
</form>

@endsection