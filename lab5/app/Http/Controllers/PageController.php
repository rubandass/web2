<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        $people = Contact::all();
        return view('welcome', compact('people'));
    }
}
