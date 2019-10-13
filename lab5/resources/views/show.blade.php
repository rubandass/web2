@extends('layout')
@section('title','show')
@section('content')

<div class="container col-md-10">
    <div>
        <form method="post" action="/contacts/{{$contact->id}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->firstName}}</td>
                    <td>{{$contact->lastName}}</td>
                    <td>{{$contact->phone}}</td>
                    <td class="text-center"><a href="/contacts/{{$contact->id}}/edit" class="btn btn-warning">Edit</a></td>
                    <td class="text-center"><button type="submit" name="submit" class="btn btn-danger">Delete</button></td>
                </tr>
            </table>
        </form>

    </div>
    <a href="/contacts" class="btn btn-primary float-right">Back</a>
</div>
@endsection