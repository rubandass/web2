@extends('layout')
@section('title','edit')
@section('content')

<form class="container" method="post" action="/contacts/{{$contact->id}}">
    {{csrf_field()}}
    {{method_field('PATCH')}}

    <div class="form-group row">
        <label for="firstName" class="col-form-lable col-md-2">ID</label>
        <div class="col-md-4">
            <input class="form-control" type="text" name="id" value="{{$contact->id}}" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="firstName" class="col-form-lable col-md-2">First Name</label>
        <div class="col-md-4">
            <input class="form-control" type="text" name="firstName" value="{{$contact->firstName}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="firstName" class="col-form-lable col-md-2">Last Name</label>
        <div class="col-md-4">
            <input class="form-control" type="text" name="lastName" value="{{$contact->lastName}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="firstName" class="col-form-lable col-md-2">Phone</label>
        <div class="col-md-4">
            <input class="form-control" type="text" name="phone" value="{{$contact->phone}}">
        </div>
    </div>

    <div>
        <input class="btn btn-primary offset-md-2" type="submit" name="submit" value="update">
    </div>
</form>

@endsection