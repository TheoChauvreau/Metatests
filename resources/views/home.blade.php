<!DOCTYPE html>
<html>
    <head>
    <link href={{ URL::asset('css/home.css') }} type="text/css" rel="stylesheet">

    <title>Metatests</title>
    </head>

    <body>
    @extends('layouts.app')
    @section('content')

<div class="container">
<h1 class="text-center">Acceuil</h1>
    <div class=" row justify-content-center">
        <div class="devant col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                <ul>
                    <li class="list"><a href="{{ route('conversations') }}">Conversations</a></li>
                    <li class="list"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} </a></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
@endsection
