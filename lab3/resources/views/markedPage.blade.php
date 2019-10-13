@extends('layout')
@section('title','Olympics-Mark')
@section('olympics_class','active')
@section('content')



<h2>Winter Olympic Quiz-Answers</h2>

<table>
    <colgroup>
        <col style="width:60%">
        <col style="width:20%">
        <col style="width:20%">
    </colgroup>
    <tr>
        <th>Question</th>
        <th>Your Answer</th>
        <th>Mark</th>
    </tr>
    @for($i=0; $i < count($answers); $i++)
        @if(is_array($answers[$i][1]))
            @for($k=0; $k < count($answers[$i][1]); $k++)
                <tr>
                    @if($k == 0)
                        <td rowspan="{{count($answers[$i][1])}}">{{$answers[$i][0]}}</td>
                    @endif
                        <td>{{$answers[$i][1][$k]}}</td>
                        <td>{{$answers[$i][2][$k]}}</td>
                </tr>  
            @endfor    
        @else
            <tr>
                <td>{{$answers[$i][0]}}</td>
                <td>{{$answers[$i][1]}}</td>
                <td>{{$answers[$i][2]}}</td>
            </tr>
        @endif

    @endfor
    
    <tr>
        <td colspan="2">Score</td>
        <td>{{$score}}</td>
    </tr>
</table>


@endsection