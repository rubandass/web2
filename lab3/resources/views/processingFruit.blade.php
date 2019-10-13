@extends('layout')
@section('title','ProcessFruit')
@section('fruit2_class','active')

@section('content')
<h2>Your favourite fruit</h2>
<table>
    <tr>
        <th>Input variable</th>
        <th>Value</th>
    </tr>

    @foreach($formData as $field => $value)
        @if($field != '_token' && $field != 'submit')
            @if(is_array($value))
                @foreach($value as $val)
                <tr>
                    <td>{{$field}}</td>
                    <td>{{strip_tags($val)}}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td>{{$field}}</td>
                    <td>{{strip_tags($value)}}</td>
                   <!--  <td>{!!$value!!}</td> ==> Applies the html tag values and then displays output
                    <td>{{strip_tags($value)}}</td> ==> Displays only the text in between the html tags
                    <td>{{strip_tags($value,"<b>")}}</td> ==> Just displays whatever in the text box
                    --> 
                </tr>
            @endif
        @endif
    @endforeach
</table>
@endsection