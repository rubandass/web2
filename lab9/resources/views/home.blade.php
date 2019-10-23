@extends('layout')
@section('title','Home')
@section('home','active')
@section('content')

<div class="container mainContent mainContentColor">
    <h4 class="text-center mb-3">Cricket World Cup Committee</h4>
    <div class="text-center">
        <img class="img-responsive bg-img homeImg" src="{{asset('/css/cup.jpg')}}" alt="Home" />
    </div>
    <div class="mt-3">
        <p class="col-md-8 offset-md-2">
            This application allows the cricket committee to keep records of all the players and their countries.
            User can add / edit / delete countries and players. Players are searchable based on any combination of fields.
        </p>
    </div>
</div>

@endsection