<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Sleep;
use App\Workout;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index1()
    {
        return view('home');
    }

    public function index2()
    {
        $workoutData = Workout::selectRaw('sum(time) as number, activity_id')->groupBy('activity_id')->get();

        $arrayPieChart[] = ['name', 'number'];
        foreach ($workoutData as $key => $value) {
            $arrayPieChart[++$key] = [$value->activity->name, (int)$value->number];
        }
        return view('home')->with('name', json_encode($arrayPieChart));

    }

    public function index()
    {
        $workoutData = Workout::selectRaw('sum(time) as number, activity_id')->groupBy('activity_id')->get();

        $arrayPieChart[] = ['name', 'number'];
        foreach ($workoutData as $key => $value) {
            $arrayPieChart[++$key] = [$value->activity->name, (int)$value->number];
        }

        $sleepData = Sleep::selectRaw('time, date')->get();

        $arrayBarChart[] = ['date', 'time'];
        foreach ($sleepData as $key => $value) {
            $arrayBarChart[++$key] = [$value->date, (float)$value->time];
        }
        return view('home')->with('name', json_encode($arrayPieChart))->with('date', json_encode($arrayBarChart));
    }
}
