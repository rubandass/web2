<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function orderPizza()
    {
        return view('orderPizza');
    }

    public function processPizza()
    {
        //$formData = request() -> all();
        // $size = request('Size');
        // $toppings = request('Toppings');
        // $address = request('Address');
        $formData = request(['Size', 'Toppings', 'Address']);
        $size = request()->input('Size', 'missing size');
        $toppings = request()->input('Toppings', 'missing toppings');
        $address = request()->input('Address', 'missing address');
        $costs = json_decode('{"small" : 5 ,  "medium" : 10 , "large" : 15}' , true);

        if (!array_key_exists($size, $costs)) {
            echo "<script type='text/javascript'>alert('No size selected');</script>";
            return view('orderPizza');
            

        }
        $cost = array_key_exists($size, $costs) ? $costs[$size] : 0;

        if (is_array($toppings)) {
            $cost += count($toppings);
        } else {
            $formData['Toppings'] = 'No toppings selected';
        }

        return view('orderDetails', compact('formData', 'cost'));
    }

    public function pizzaDetails()
    {
        $formData = request()->all();
        //$cost = $formData['cost'];
        $pizzacost = request()->input('cost', 0);

        if (isset($formData['cancel'])) {
            return redirect('/');
        } else {
            return view('thankYou', compact('pizzacost'));
        }
    }
}
