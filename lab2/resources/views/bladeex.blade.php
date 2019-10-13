@extends('layout')
@section('title','Bladeex')
@section('bladeex_class','active')
@section('content')

<p>
    <h2>Exercise : 5 </h2>

    @if($randomNumber > 10)
    The random Number is : {{$randomNumber}}<br>
    The number is large.
    @else
    The random Number is : {{$randomNumber}}<br>

    @if($randomNumber %2 == 0)
    The number is even and less than 11
    @else
    The number is odd and less than 11
    @endif
    @endif
</p>

<p>
    <h2>Exercise : 6 </h2>
    @foreach($favouriteAnimal as $key => $value)
    @if($loop->first)
    Pets details (There are {{$loop->count}} fields) : <br>
    @endif
    @if($loop->last)
    The last field is : <br>
    {{$key}} {{$value}} {{$loop->index}}<br>
    @else
    {{$key}} {{$value}} {{$loop->index}}<br>
    @endif
    @endforeach

</p>

<p>
    <h2>Exercise : 7</h2>
    @while($number > 0)
    I will not loop forever {{$number}} <br>
    @php
    $number--;
    @endphp
    @endwhile
</p>

<p>
    <h2>Exercise : 8</h2>
    {{$animal}}<br>
    @unless($animal == 'dog' || $animal == 'cat' || $animal == 'hamster' )
    <p>{{$animal}} is not a pet animal</p>
    @endunless

</p>
@endsection