@extends('layout')
@section('title','Player')
@section('player','active')
@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary ml-3 mt-5 mb-5" id="addPlayer">
            Add New Player
        </button>
        <button type="button" class="btn btn-primary ml-3 mt-5 mb-5" id="searchPlayer">
        <span class="glyphicon glyphicon-search"></span> Search
        </button>
    </div>
    <div class="container-fluid col-md-12">
        <div class="row">
            <!-- Looping around the player and display as card-->

            @if(sizeof($players) == 0)
            <p>Records not found</p>

            @else
            @foreach($players as $player)
            <div class="col-md-6 col-lg-4 space_div">
                <div class="card cardPlayer border-0 br-5" style="width: 18rem;">
                    <div class="ribbon">
                        <span class="ribbon1">
                            <span>{{$player->country->name}}</span>
                        </span>
                    </div>
                    <img class="card-img-top" src="{{'storage/'.$player->image}}" alt="{{$player->name}}">
                    <div class="card-body">
                        <h5 class="card-title text-center text-dark">{{$player->name}} ({{$player->age}})<br /></h5>
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Role:</b> {{$player->role}}</li>
                                <li class="list-group-item"><b>Batting:</b> {{$player->batting}}</li>
                                <li class="list-group-item"><b>Bowling:</b> {{$player->bowling}}</li>
                                <li class="list-group-item"><b>ODI Runs:</b> {{$player->odiRuns}}</li>
                                <li class="list-group-item text-center">
                                    <button type="button" class="btn btn-sm btn-warning editPlayer" data-id="{{$player->id}}" data-name="{{$player->name}}" data-age="{{$player->age}}" data-role="{{$player->role}}" data-batting="{{$player->batting}}" data-bowling="{{$player->bowling}}" data-image="{{$player->image}}" data-odi_runs="{{$player->odiRuns}}" data-country_id="{{$player->country->id}}">Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger deletePlayer" data-id="{{$player->id}}" data-name="{{$player->name}}">Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>


    <!-- Add/Edit player modal dialog -->

    <div class="modal fade" id="playerModal" tabindex="-1" role="dialog" aria-labelledby="playerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="/players" enctype="multipart/form-data" id="playerForm">
                    {{csrf_field()}}

                    <div id="route">
                        {{method_field('PATCH')}}
                    </div>

                    <div class="modal-header">
                        <h5 class="modal-title" id="playerModalLabel">Add Player</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input class="form-control  form-control-sm" type="text" name="name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Country</label>
                                <select class="form-control form-control-sm" name="country_id">
                                    <option selected value="">Select Country</option>
                                    <!--  Looping around the players country-->
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Age</label>
                                <input class="form-control  form-control-sm" type="text" name="age" />
                            </div>
                            <div class="form-group  col-md-3">
                                <label>ODI Runs</label>
                                <input class="form-control  form-control-sm" type="text" name="odi_runs" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <input class="form-control  form-control-sm" type="text" name="role" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group  col-md-6">
                                <label>Batting</label>
                                <input class="form-control  form-control-sm" type="text" name="batting" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bowling</label>
                                <input class="form-control  form-control-sm" type="text" name="bowling" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3">Image</label>
                            <img class="card-img-top ml-5" src="images_will_be_replaced_by_js" alt="" id="playerImage" style="width: 12rem;">
                            <input type="file" class="form-control-file col-md-8" name="image" id="playerImageInputFile" accept="image/png, image/jpeg" />
                        </div>
                    </div>
                    <ul class="text-danger" id="errors"></ul>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitPlayer">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete player modal dialog -->
    <div class="modal fade" id="playerDeleteModal" tabindex="-1" role="dialog" aria-labelledby="playerDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/players" enctype="multipart/form-data" id="playerDeleteForm">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="playerDeleteModalLabel">Delete Player</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h6>Are you sure you want to delete this player: <b><span id="spanPlayerName"></span></b> ?</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Search player modal dialog -->

    <div class="modal fade" id="playerSearchModal" tabindex="-1" role="dialog" aria-labelledby="playerSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input class="form-control  form-control-sm" type="text" name="name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Country</label>
                                <select class="form-control form-control-sm" name="country_id">
                                    <option selected value="">Select Country</option>
                                    <!--  Looping around the players country-->
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Age</label>
                                <input class="form-control  form-control-sm" type="text" name="age" />
                            </div>
                            <div class="form-group  col-md-3">
                                <label>ODI Runs</label>
                                <input class="form-control  form-control-sm" type="text" name="odi_runs" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <input class="form-control  form-control-sm" type="text" name="role" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group  col-md-6">
                                <label>Batting</label>
                                <input class="form-control  form-control-sm" type="text" name="batting" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bowling</label>
                                <input class="form-control  form-control-sm" type="text" name="bowling" />
                            </div>
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


</div>
@endsection