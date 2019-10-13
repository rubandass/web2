@extends('layout')
@section('title','fruit2')
@section('fruit2_class','active')
@section('content')

<style>
    fieldset {
        display: inline-block;
    }
</style>

<h1>Small Quiz</h1>
<form method="post" action="/fruit2">
    {{csrf_field()}}
    <fieldset>
        <legend>Fruity questions</legend>
        <p>Select a fruit</p>
        <input type="checkbox" name="fruit[]" value="apple">
        apple<br>
        <input type="checkbox" name="fruit[]" value="paech">
        peach<br>
        <input type="checkbox" name="fruit[]" value="orange">
        orange<br>
        <p><label>Your favourite vagetable is:
                <input type="text" name="vegetable" required></label>
            <br>
            <input type="submit" name="submit" value="submit">
        </p>
    </fieldset>

</form>

@endsection