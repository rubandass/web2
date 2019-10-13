@extends('layout')
@section('title','lab4-3')
@section('lab4-3_class','active')
@section('content')

<h2>Exercise lab4-3</h2>

<?php
$indexLength = rand(0, 25);
$numberArray = array($indexLength);

for ($i = 0; $i < $indexLength; $i++) {
    $numberArray[$i] = rand(0, 100);
}

?>

<table>
    <tr>
        <th>Index</th>
        <th>Value</th>
    </tr>

    <?php
    foreach ($numberArray as $key => $value) {
        echo ("<tr><td>$key</td><td>$value</td></tr>");
    }
    ?>
</table>

@endsection