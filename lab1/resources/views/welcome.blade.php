@extends('layout')
@section('title','Welcome')
@section('home_class','active')
@section('content')
<h2>Welcome to Laravel project</h2>
<div class="image-home">
    <img src="/images/Laravel.png" width="100%" alt="Laravel">
</div>
<div class="text-home">
    <h4>All check points should be:</h4>
    <ul>
        <li>Html5 validated</li>
        <li>CSS validated</li>
        <li>Version controlled (gitlab)</li>
    </ul>
</div>

@endsection