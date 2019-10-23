@extends('layout')
@section('title','Player')
@section('player','active')
@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary ml-3 mt-2 mb-1" id="addPlayer">
            Add New Player
        </button>
        <button type="button" class="btn btn-primary ml-3 mt-2 mb-1" id="searchPlayer">
            <span class="glyphicon glyphicon-search"></span> Search
        </button>
	<button type="button" class="btn btn-danger ml-3 mt-2 mb-1" id="deletePlayers">
            Delete
        </button>
    </div>
	<form method="POST" action="{{url('/players')}}" enctype="multipart/form-data" id="deleteForm">
    <div class="container-fluid col-md-12">
        <div class="row">
            <!-- Looping around the player and display as card-->
            @if(sizeof($players) == 0)
                <p class="mt-3 ml-3">No players matched the search criteria</p>
            @else
            @foreach($countries as $country)
                @foreach($players as $player)
                    @if($player->country == $country)
                    <div class="col-md-6 col-lg-4 space_div">
                        <div class="card cardPlayer border-0 br-5" style="width: 18rem;">
                            <div class="ribbon">
                                <span class="ribbon1">
                                    <span>{{$player->country->name}}</span>
                                </span>
                            </div>
			     <input name="players" type="checkbox" value="{{$player->id}}" style="width: 25px; height: 25px; margin:5px; position: absolute;">	
                                           
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
                    @endif
                @endforeach
            @endforeach
            @endif
        </div>
    </div>
	</form>


    <!-- Add/Edit player modal dialog -->

    <div class="modal fade" data-backdrop="static" id="playerModal" tabindex="-1" role="dialog" aria-labelledby="playerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{url('/players')}}" enctype="multipart/form-data" id="playerForm">
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
                                    @foreach ($countries->sortBy('name') as $country)
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
                            <img class="card-img-top ml-5" src="images_will_be_replaced_by_js" alt="" id="playerImage" style="width: 8rem; height: 8rem;">
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
    <div class="modal fade" data-backdrop="static" id="playerDeleteModal" tabindex="-1" role="dialog" aria-labelledby="playerDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{url('/players')}}"  data-url="{{url('/players')}}" enctype="multipart/form-data" id="playerDeleteForm">
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
	
	
	<!-- custom Delete players modal dialog -->
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="deletePlayersModal" tabindex="-1" role="dialog" aria-labelledby="deletePlayersModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{url('/deletePlayers')}}" enctype="multipart/form-data" id="deletePlayersForm">
                    {{csrf_field()}}
			<input type="hidden" name="ids" id="ids" value="" />
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePlayersModalLabel">Delete Player</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h6 id="message">Are you sure you want to delete the selected players: ?</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Search player modal dialog -->

    <div class="modal fade" data-backdrop="static" id="playerSearchModal" tabindex="-1" role="dialog" aria-labelledby="playerSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="GET" action="{{url('/players')}}" id="playerSearchForm">
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
                                    @foreach ($countries->sortBy('name') as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Age</label>
                                <input class="form-control  form-control-sm" type="text" name="age" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>ODI Runs</label>
                                <div class="row ml-1">
                                    <input class="form-control form-control-sm col-md-5" type="text" name="min_odi_runs" />
                                    <span class="ml-2 mr-2">to</span>
                                    <input class="form-control form-control-sm col-md-5" type="text" name="max_odi_runs" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <select class="form-control form-control-sm" name="role">
                                    <option selected value="">Select Role</option>
                                    <!--  Looping around the players role-->
                                    @foreach($roles as $role )
                                        <option value="{{$role}}">{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Batting</label>
                                <select class="form-control form-control-sm" name="batting">
                                    <option selected value="">Select Batting</option>
                                    <!--  Looping around the players batting style-->
                                    @foreach($battingStyles as $battingStyle )
                                        <option value="{{$battingStyle}}">{{$battingStyle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bowling</label>
                                <select class="form-control form-control-sm" name="bowling">
                                    <option selected value="">Select Bowling</option>
                                    <!--  Looping around the players bowling style-->
                                    @foreach($bowlingStyles as $bowlingStyle)
                                        @if(isset($bowlingStyle))
                                            <option value="{{$bowlingStyle}}">{{$bowlingStyle}}</option>
                                        @endif
                                    @endforeach
                                </select>
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
@section('scripts')
<script src="{{asset('/js/player.js')}}"></script>
@endsection
