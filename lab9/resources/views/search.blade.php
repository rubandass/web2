@extends('layout')
@section('title','Search')
@section('content')

<!-- Search player form -->
<div class="container mainContent searchColor mt-5">
    <form method="POST" action="/search" id="playerSearchForm">
        {{csrf_field()}}
        <div class="col-md-8">
            <div class="form-group row">
                <label class="col-md-3">Name</label>
                <input class="form-control col-md-9" type="text" name="name" />
            </div>
            <div class="form-group row">
                <label class="col-md-3">Age</label>
                <input class="form-control col-md-9" type="text" name="age" />
            </div>
            <div class="form-group row">
                <label class="col-md-3">Role</label>
                <input class="form-control col-md-9" type="text" name="role" />
            </div>
            <div class="form-group row">
                <label class="col-md-3">Batting</label>
                <input class="form-control col-md-9" type="text" name="batting" />
            </div>
            <div class="form-group row">
                <label class="col-md-3">Bowling</label>
                <input class="form-control col-md-9" type="text" name="bowling" />
            </div>
            <div class="form-group row">
                <label class="col-md-3">ODI Runs</label>
                <input class="form-control col-md-9" type="text" name="odi_runs" />
            </div>
            <div class="form-group row">
                <label class="col-md-3">Country</label>
                <select class="form-control col-md-9 custom-select" name="country_id">
                    <option selected value="">Select Country</option>
                    <!--  Looping around the players country-->
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-8 text-right">
            <a class="btn btn-secondary" href="/">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<div class="modal fade" id="playerSearchModal" tabindex="-1" role="dialog" aria-labelledby="playerSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/search" id="playerSearchForm">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="playerSearchModalLabel">Search Player</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-3">Name</label>
                        <input class="form-control col-md-8" type="text" name="name" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Age</label>
                        <input class="form-control col-md-8" type="text" name="age" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Role</label>
                        <input class="form-control col-md-8" type="text" name="role" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Batting</label>
                        <input class="form-control col-md-8" type="text" name="batting" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Bowling</label>
                        <input class="form-control col-md-8" type="text" name="bowling" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ODI Runs</label>
                        <input class="form-control col-md-8" type="text" name="odi_runs" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Country</label>
                        <select class="form-control col-md-8 custom-select" name="country_id">
                            <option selected value="">Select Country</option>
                            <!--  Looping around the players country-->
                            @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection