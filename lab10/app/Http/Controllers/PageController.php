<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        session()->flush();
        return view('page1');
    }

    public function data()
    {
        $bgColor = request('bgColor');
        $name = request('name');
        session(['bgColor' => $bgColor, 'name' => $name]);

        return view('page2');
    }
}
