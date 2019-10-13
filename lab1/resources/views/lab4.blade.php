@extends('layout')
@section('title', 'Lab4')
@section('lab4_class','active')
@section('content')

<h2>Lab4 programming exercise</h2>
<?php
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($i % 2 == 0) {
            echo ("<img class=\"dino\" src=\"/images/happyPenguin.gif\" alt=\"Penguin\" />");
        } else {
            echo ("<img class=\"dino\" src=\"/images/angryDino.gif\" alt=\"Dinosaur\" />");
        }
    }
    echo ("<br>");
}

echo ("<br>");

/*
for ($i = 1; $i <= 11; $i++) {

    if ($i <= 6) {
        for ($j = 0; $j <= $i - 1; $j++) {

            if ($i % 2 == 0) {
                echo ("<img class=\"dino\" src=\"/images/happyPenguin.gif\" alt=\"Penguin\" />");
            } else {
                echo ("<img class=\"dino\" src=\"/images/angryDino.gif\" alt=\"Dinosaur\" />");
            }
        }
    } else {
        for ($k = 12 - $i; $k >= 1; $k--) {
            if ($i % 2 == 0) {
                echo ("<img class=\"dino\" src=\"/images/happyPenguin.gif\" alt=\"Penguin\" />");
            } else {
                echo ("<img class=\"dino\" src=\"/images/angryDino.gif\" alt=\"Dinosaur\" />");
            }
        }
    }

    echo ("<br>");
}
*/

$limit = 6;
for ($i = 1; $i <= $limit; $i++) {
    for ($j = 1; $j <=  $i; $j++) {
        if ($i % 2 == 0) {
            echo ("<img class=\"dino\" src=\"/images/happyPenguin.gif\" alt=\"Penguin\" />");
        } else {
            echo ("<img class=\"dino\" src=\"/images/angryDino.gif\" alt=\"Dinosaur\" />");
        }
    }
    echo ("<br>");
}

for ($i = $limit - 1; $i >= 1; $i--) {
    for ($j = 1; $j <=  $i; $j++) {
        if ($i % 2 == 0) {
            echo ("<img class=\"dino\" src=\"/images/happyPenguin.gif\" alt=\"Penguin\" />");
        } else {
            echo ("<img class=\"dino\" src=\"/images/angryDino.gif\" alt=\"Dinosaur\" />");
        }
    }
    echo ("<br>");
}

?>
@endsection