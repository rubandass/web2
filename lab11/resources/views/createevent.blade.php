@extends('layout')
@section('title','lab11')
<!-- section('player','active') -->
@section('content')
<div class="container col-md-6">
    <form action="{{url('event/add')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
        </div>

        <div class="form-group">
            <label for="start_date">Start date</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>

        <div class="form-group">
            <label for="end_date">End date</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <button type="submit" class="btn btn-success">Add event</button>
    </form>
</div>
@endsection