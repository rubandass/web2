@extends('layout')
@section('title','lab2-1')
@section('lab2-1_class','active')
@section('content')

<div>

    <h4>Exercise 1:</h4>
    <p>
        @for ($i = 1; $i <= 5; $i++) {{$i}}<br>
            @endfor
    </p>

    <h4>Exercise 2:</h4>
    <p>
        Page name is {{$_SERVER['PHP_SELF']}}<br>
        server name is {{$_SERVER['SERVER_NAME']}}
    </p>

    <h4>Exercise 3:</h4>
    <p>
        @foreach($animalSpecies as $animal)
        {{$animal}}<br>
        @endforeach
    </p>

    <h4>Exercise 4:</h4>

    <table>
        <tr>
            <th>Location</th>
            <th>Animal</th>
        </tr>
        @foreach($animalSpecies as $Index => $animal)
        <tr>
            <td>{{$Index}}</td>
            <td>{{$animal}}</td>
        </tr>
        @endforeach

    </table>

    <h4>Exercise 5:</h4>
    <table>
        <tr>
            <th>Variable Name</th>
            <th>Value</th>
        </tr>

        @foreach($_SERVER as $key => $value)
        <tr>
            <td>{{$key}}</td>
            <td>{{$value}}</td>
        </tr>
        @endforeach

    </table>

    <h4>Exercise 6:</h4>
    {{phpinfo()}}

</div>
@endsection