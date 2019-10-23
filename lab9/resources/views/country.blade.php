@extends('layout')
@section('title','Country')
@section('country','active')
@section('content')
<div class="container">
    <button type="button" class="btn btn-primary ml-3 mt-2 mb-2" id="addCountry">
        Add New Country
    </button>
    <div class="container-fluid col-md-12">
        <div class="row">
            @foreach($countries->sortBy('name') as $country)
            <div class="col-md-6 col-lg-3 space_div">
                <div class="card border-0 m-1 br-5" style="width: 12rem;">
                    <img class="card-img-top" src="{{asset('storage/'. $country->flag)}}" alt="{{$country->name}}">
                    <div class="card-body">
                        <h6 class="card-title text-center text-dark">{{$loop->iteration}}. {{$country->name}} </h6>
                        <hr>
                        <div class="text-center">
                            <button type="button" data-id="{{$country->id}}" class="btn btn-sm btn-warning editCountry" data-name="{{$country->name}}" data-flag="{{$country->flag}}">Edit</button>
                            @if(sizeof($country->players)==0)
                            <button class="btn btn-sm btn-danger deleteCountry" data-id="{{$country->id}}" data-name="{{$country->name}}">Delete</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Add/Edit country modal dialog -->


    <div class="modal show" data-backdrop="static" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="countryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{url('/countries')}}" enctype="multipart/form-data" id="countryForm">
                    {{csrf_field()}}
                    <div id="route">
                        {{method_field('PATCH')}}
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="countryModalLabel">Add Country</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" id="id" />
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" />
                        </div>
                        <div class="form-group">
                            <label>Flag image</label><br />
                            <img class="card-img-top" src="images_will_be_replaced_by_js" alt="" id="countryImage" style="width: 10rem; height: auto;">
                            <input type="file" class="form-control-file" name="flag" id="countryImageInputFile" />
                        </div>
                    </div>
                    <ul class="text-danger" id="errors"></ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitCountry">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete country modal dialog -->
    
    <div class="modal fade" data-backdrop="static" id="countryDeleteModal" tabindex="-1" role="dialog" aria-labelledby="countryDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{url('/countries')}}" data-url="{{url('/countries')}}" enctype="multipart/form-data" id="countryDeleteForm">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="countryDeleteModalLabel">Delete Country</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h6>Are you sure you want to delete this country: <b><span id="spanCountryName"></span></b> ?</h6>
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
</div>

@endsection
@section('scripts')
<script src="{{asset('/js/country.js')}}"></script>
@endsection