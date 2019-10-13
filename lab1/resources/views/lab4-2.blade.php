@extends('layout')
@section('title','lab4-2')
@section('lab4-2_class','active')
@section('content')

<div class="lab4-color">
    <link type="text/css" rel="stylesheet" href="/css/color.php">
    <?php

    //header("content-type:text/css");
    $a = rand(0, 255);
    $b = rand(0, 255);
    $c = rand(0, 255);
    $rgb = "$a,$b,$c";
    echo ("The background color is $rgb");
    ?>
</div>
@endsection