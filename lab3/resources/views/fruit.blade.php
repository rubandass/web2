@extends('layout')
@section('title','fruits')
@section('fruit_class','active')
@section('content')

<style>
    fieldset {
        display: inline-block;
    }
</style>

<h1>Small Quiz</h1>
<form method="post" action="/fruit">
    {{csrf_field()}}
    <fieldset>
        <legend>Fruity questions</legend>
        <p>Select a fruit</p>
        <input type="radio" name="fruit" value="apple" required>
        apple<br>
        <input type="radio" name="fruit" value="paech" required>
        peach<br>
        <input type="radio" name="fruit" value="orange" required>
        orange<br>
        <p><label>Your favourite vagetable is:
                <input type="text" name="vegetable" required></label>
            <br>
            <input type="submit" name="submit" value="submit">
        </p>
    </fieldset>

</form>

@endsection