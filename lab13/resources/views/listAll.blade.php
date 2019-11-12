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

                    Pets
                    <table class="table table-bordered">
                        <thead class="table-info">
                            <tr>
                                <th>Name</th>
                                <th>Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @foreach($pets as $pet)
                            @if($pet->owner->name == $user->name)
                            <tr>
                                <td>{{$pet->name}}</td>
                                <td>{{$pet->owner->name}}</td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
