@extends('layouts.app')
@section('title','Workouts')
@section('workouts','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#tab1" data-toggle="tab">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab2" data-toggle="tab">Alcohol</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab3" data-toggle="tab">Snack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab4" data-toggle="tab">Sleep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab5" data-toggle="tab">Mood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab6" data-toggle="tab">Weight</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <form class="col-md-6 mt-4" action="/workouts/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Activity</label>
                                    <div class="input-group ml-1">
                                        <select class="form-control" name="activity">
                                            @foreach ($activities as $activity){
                                            <option value="{{$activity->id}}">{{$activity->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addActivityModal">
                                            <span class="glyphicon glyphicon-plus"></span> Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Distance</label>
                                <input type="text" class="form-control" name="distance" placeholder="Enter distance in km">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Start time</label>
                                    <input type="time" class="form-control" name="start_time" placeholder="Enter start time">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>End time</label>
                                    <input type="time" class="form-control" name="end_time" placeholder="Enter end time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="form-group offset-md-4">
                                <a href="/home" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        content2
                    </div>
                    <div class="tab-pane" id="tab3">
                        content3
                    </div>
                    <div class="tab-pane" id="tab4">
                        content4
                    </div>
                    <div class="tab-pane" id="tab5">
                        content5
                    </div>
                    <div class="tab-pane" id="tab6">
                        content6
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Activity Modal -->
<div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/addActivity" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="activityName" placeholder="Enter Activity name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection