@extends('layouts.app')

@section('content')

<h2>Ajouter un message</h2>
<form action='{{route('addMessage')}}' method='POST' id = 'form'>
    {{csrf_field()}}
    <textarea name='message' form='form'></textarea>
    <input type ='checkbox' name='isBot'> Bot ?</input>
    <input type='hidden' name='id' value='{{$id}}'>
    <button type='submit'>Valider</button>
</form>

@endsection