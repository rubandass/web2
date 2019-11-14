@extends('layouts.app')
@section('title','Workouts')
@section('workouts','active')
@section('content')
<div class="container">
    <div class="row">
        <form class="col-md-4 mt-3" action="/workouts/storeAcitivy" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group form-row">
                <div class="form-group col-md-12">
                    <label for="selectActivity">Activity</label>
                    <div class="input-group">
                        <select class="form-control" name="activity" id="selectActivity">
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

            <div class="form-group">
                <label>Workout Time</label>
                <div class="form-row">
                    <input class="form-control col-md-5 ml-1" type="text" name="time_hr" placeholder="Hr" />
                    <span class="ml-2 mr-2">:</span>
                    <input class="form-control col-md-6" type="text" name="time_min" placeholder="Min" />
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
                        <th>Time</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workouts as $workout)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$workout->activity->name}}</td>
                        <td class="text-center">{{$workout->distance}}</td>
                        <td class="text-center">{{(int)($workout->time/60)}} Hr {{(int)($workout->time%60)}} mins</td>
                        <td class="text-center">{{$workout->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total</b></td>
                        <td class="text-center"><b>{{$totalWorkoutDistance}} km</b></td>
                        <td class="text-center"><b>{{(int)($totalTimeInMin/60)}} Hr {{(int)($totalTimeInMin%60)}} mins</b></td>
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
                        <input type="text" class="form-control" name="activityName" placeholder="Enter activity name">
                    </div>
                    <div class="form-group ">
                    
                            <label>Activity color</label>
                            <input type="color" class="ml-2" style="width30px; height:30px" name="activityColor" placeholder="Choose activity color">
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