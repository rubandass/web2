@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="offset-md-2" method="POST" action="/pets" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" id="id" />
                            <label>Pet Name</label>
                            <input class="form-control col-md-8" type="text" name="name" />
                        </div>
                        <div class="form-group offset-md-4">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                            <a href="/home" class="btn btn-secondary">Cancel</a>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="/pets" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" id="id" />
                <label>Pet Name</label>
                <input class="form-control col-md-4" type="text" name="name" />
            </div>
            <div class="form-group offset-md-2">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
-->