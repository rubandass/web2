<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //session()->forget('bgColor');
        return view('page1');
    }

    public function data()
    {
        $bgColor = request('bgColor');
        $shapeColor = request('shapeColor');
        $name = request('name');
        session(['bgColor' => $bgColor, 'name' => $name, 'shapeColor' => $shapeColor]);

        return view('page1');
    }

    public function dataPage2()
    {
        return view('page2');
    }

    public function dataPage3()
    {
        return view('page3');
    }

    public function exitPage()
    {
        session()->flush();
        return view('exit');
    }
}
