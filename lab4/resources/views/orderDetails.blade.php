@extends('layout')
@section('title','Order Details')
@section('content')
<div class="bg-dark-transparent text-white col-lg-6 offset-lg-3 p-3 mt-5">
    <h2 class="text-center">Your order</h2>
    <table class="table table-bordered text-center text-white">
        @foreach($formData as $field => $value)
        <tr>
            <th>{{$field}}</th>
            <td>{{!is_array($value) ? $value : join(", ", $value)}}</td>
        </tr>
        @endforeach
    </table>

    <form class="text-center" method="post" action="/thankYou">
        {{csrf_field()}}
        <h6>Total cost is $ {{$cost}}</h6>
        <input type="hidden" name="cost" value="{{$cost}}">
        <a class="btn btn-danger" href="/">Cancel Order</a>
        <!-- <input class="btn btn-danger" type="submit" name="cancel" value="Cancel Order"> -->
        <input class="btn btn-success" type="submit" name="confirm" value="Confirm Order">
    </form>
</div>
@endsection