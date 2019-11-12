@extends('layouts.app')
@section('title','Fitness')
@section('workouts','active')
@section('content')
<div class="container">
    <div class="row">
        <form class="col-md-4 mt-3" action="/workouts/storeAcitivy" method="post" enctype="multipart/form-data">
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
                <label>Workout date</label>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="form-group offset-md-4">
                <a href="/home" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <div class="col-md-7 mt-5 offset-md-1">
            <table class="table table-bordered">
                <thead class="table-info">
                    <tr class="text-center">
                        <th>Sl.No</th>
                        <th>Activity</th>
                        <th>Distance</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workouts as $workout)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$workout->activity->name}}</td>
                        <td>{{$workout->distance}}</td>
                        <td>{{$workout->start_time}}</td>
                        <td>{{$workout->end_time}}</td>
                        <td>{{$workout->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total</b></td>
                        <td><b>{{$totalWorkoutDistance}} km</b></td>
                        <td colspan="2" class="text-center"><b>{{$totalWorkoutTime}} Hrs</b></td>
                    </tr>
                </tfoot>
            </table>
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
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="activityName" placeholder="Enter Activity name">
                    </div>
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