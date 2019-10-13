@extends('layout')
@section('title','lab2')
@section('lab2_class','active')
@section('content')

<div>

    <h4>Exercise 1:</h4>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo ("$i<br>");
    }
    ?>

    <h4>Exercise 2:</h4>
    <?php
    $fileName = $_SERVER['PHP_SELF'];
    $serverName = $_SERVER['SERVER_NAME'];

    echo ("Page name is $fileName<br>");
    echo ("Server name is $serverName");
    ?>

    <h4>Exercise 3:</h4>
    <?php

    $animalSpecies = array("horse", "dog", "sheep", "flamingo", "hippo");
    foreach ($animalSpecies as $animal) {
        echo ("$animal<br>");
    }

    ?>

    <h4>Exercise 4:</h4>

    <table>
        <tr>
            <th><b>Location</th>
            <th><b>Animal</th>
        </tr>
        <?php
        $animalSpecies = array("horse", "dog", "sheep", "flamingo", "hippo");

        foreach ($animalSpecies as $index => $animal) {
            echo ("<tr><td>$index</td><td>$animal</td></tr>");
        }

        ?>
    </table>

    <h4>Exercise 5:</h4>
    <table>
        <tr>
            <th><b>Variable Name</th>
            <th colspan=3><b>Value</th>
        </tr>
        <?php
        $server = $_SERVER;
        $key = key($server);
        $value = current($server);
        foreach ($server as $key => $value) {
            echo ("<tr><td>$key</td><td>$value</td></tr>");
        }
        ?>
    </table>

    <h4>Exercise 6:</h4>
    <?php
    phpinfo();
    ?>
</div>
@endsection