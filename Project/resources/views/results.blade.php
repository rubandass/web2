@extends('layouts.app')
@section('title','Results')
@section('results','active')
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
                                    <td colspan="2"  class="text-center"><b>Total</b></td>
                                    <td><b>{{$totalWorkoutDistance}} km</b></td>
                                    <td colspan="2"  class="text-center"><b>{{$totalWorkoutTime}} Hrs</b></td>
                                </tr>
                            </tfoot>
                        </table>
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
@endsection