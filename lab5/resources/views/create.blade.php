@extends('layout')
@section('title','edit')
@section('content')

<div class="container col-md-10 offset-md-3 mt-5">
    <form method="POST" action="/contacts">
        {{csrf_field()}}

        <div class="form-group row">
            <label id="firstName" class="col-form-lable col-md-2">First Name</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="firstName" placeholder="First Name">
            </div>
        </div>

        <div class="form-group row">
            <label id="lastName" class="col-form-lable col-md-2">Last Name</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="lastName" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group row">

            <label id="phone" class="col-form-lable col-md-2">Phone</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="phone" placeholder="phone number">
            </div>
        </div>


        <div class="container col-md-4 offset-md-2">
            <a href="/contacts" class="btn btn-primary offset-md-6">Back</a>
            <input class="btn btn-success float-right" type="submit" name="submit" value="Create">

        </div>
    </form>
</div>
@endsection