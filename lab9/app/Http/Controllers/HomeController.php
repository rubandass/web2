<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $countries = Country::all();
        return view('home', compact('countries'));
    }

    public function search()
    {
        $countries = Country::all();
        return view('search', compact('countries'));
    }
}
