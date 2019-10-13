@extends('layout')
@section('title','index')
@section('content')

<div class="container col-md-4">
<h5 class="offset-md-1">Contacts</h5>

    @foreach($contacts as $contact)
    <ul>
        <li>
            <a href="/contacts/{{$contact->id}}">
                {{$contact->firstName}}
            </a>
        </li>
    </ul>
    @endforeach

    <a href="/contacts/create" class="btn btn-primary">Add New Contact</a>
</div>
@endsection