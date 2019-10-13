@extends('layout')
@section('title','Thank you')
@section('content')
<div class="bg-dark-transparent text-white col-lg-6 offset-lg-3 p-3 mt-5">
    <p>Thank you for your order</p>
    <p>Your pizza is on the way</p>
    <p>Have ready your $ {{$pizzacost}}</p>
</div>
@endsection