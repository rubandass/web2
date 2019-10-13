@extends('layout')
@section('title','Country')
@section('content')


<div class="modal fade" id="countryEditModal" tabindex="-1" role="dialog" aria-labelledby="countryEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/countries" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="modal-header">
                    <h5 class="modal-title" id="countryEditModalLabel">Edit Country</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" />
                        <label>Country Name</label>
                        <input class="form-control" type="text" name="name" value="{{$country->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Flag image</label>
                        <input type="file" class="form-control-file" name="flag" id="flagInputFile" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection