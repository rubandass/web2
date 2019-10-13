@extends('layout')
@section('title','Pizza')
@section('content')
<h2 class="text-center">Pizza Ordering</h2>
<div class="bg-dark-transparent text-white col-lg-6 offset-lg-3 p-3">
    <form method="post" action="/">
        {{csrf_field()}}
        <fieldset class="border p-3">
            <legend class="w-auto">Place your Order</legend>
            <div class="form-group">

                <label class="form-check-label">Size</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="small" name="Size" value="small">
                    <label class="form-check-label" for="small">Small($5)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="medium" name="Size" value="medium">
                    <label class="form-check-label" for="medium">Medium($10)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="large" name="Size" value="large">
                    <label class="form-check-label" for="large">Large($15)</label>
                </div>
            </div>

            <div class="form-group">

                <label class="form-check-label">Please select your Toppings($1 for each topping)</label>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Toppings[]" id="pepperoni" value="pepperoni">
                    <label class="form-check-label" for="pepperoni">Pepperoni</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Toppings[]" id="mushroom" value="mushroom">
                    <label class="form-check-label" for="mushroom">Mushrooms</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Toppings[]" id="capsicum" value="capsicum">
                    <label class="form-check-label" for="capsicum">Capsicum</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Toppings[]" id="olive" value="olive">
                    <label class="form-check-label" for="olive">Olives</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Toppings[]" id="anchovies" value="anchovies">
                    <label class="form-check-label" for="anchovies">Anchovies</label>
                </div>
            </div>

            <div class="form-group">
                <label>Delivery Address</label>
                <input class="form-control" type="text" name="Address" required placeholder="Enter address" value="">
            </div>
            <input class="btn btn-primary float-right" type="submit" name="Submit" value="Send Order">
        </fieldset>
    </form>
</div>
@endsection