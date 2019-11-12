@extends('layouts.app')
@section('title','Fitness')
@section('workouts','active')
@section('content')
<div class="container">
    <div class="row">
        <form class="col-md-4 mt-1" action="/workouts/storeSnack" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h5>Enter Snack details</h5>
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="date">
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Item</label>
                    <div class="input-group ml-1">
                        <select class="form-control" name="item_name">
                            @foreach ($items as $item){
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addItemModal">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Kj</label>
                <input type="text" class="form-control" name="kj" placeholder="Enter drink's kj">
            </div>

            <div class="form-group">
                <label>Calories</label>
                <input type="text" class="form-control" name="calorie" placeholder="Enter drink's calorie">
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
                        <th>Item</th>
                        <th>Calories</th>
                        <th>Kj</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($snacks as $snack)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$snack->item->name}}</td>
                        <td>{{$snack->calories}}</td>
                        <td>{{$snack->kj}}</td>
                        <td>{{$snack->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/addItem" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="item" value="snack" />
                        <label>Name</label>
                        <input type="text" class="form-control" name="item_name" placeholder="Enter Item name">
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