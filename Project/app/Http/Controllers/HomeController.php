<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Mood;
use App\Sleep;
use App\Snack;
use App\Weight;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        // $workoutData = Workout::selectRaw('sum(time) as number, activity_id')->groupBy('activity_id')->get();
        $workoutData = DB::table('users')->join('activities', 'users.id', '=', 'activities.user_id')->join('workouts', 'activities.id', '=', 'workouts.activity_id')->selectRaw('sum(workouts.time) as number, activities.name')->groupBy('activities.name')->where('user_id', auth()->id())->get();


        $arrayPieChart[] = ['name', 'number'];
        foreach ($workoutData as $key => $value) {
            $arrayPieChart[++$key] = [$value->name, (int) $value->number];
        }

        //$snackData = Snack::selectRaw('sum(calories) as calories, date')->groupBy('date')->get();
        $snackData = DB::table('users')->join('items', 'users.id', '=', 'items.user_id')->join('snacks', 'items.id', '=', 'snacks.item_id')->selectRaw('sum(snacks.calories) as calories, snacks.date')->groupBy('snacks.date')->where('user_id', auth()->id())->get();

        $arrayBarChart[] = ['date', 'calories'];
        foreach ($snackData as $key => $value) {
            $arrayBarChart[++$key] = [$value->date, (float) $value->calories];
        }

        $avgSleepHrs = Sleep::where('user_id', auth()->id())->avg('time');
        $arraySleepGauge[] = ['date', 'time'];
        $arraySleepGauge[1] = ["Sleep", $avgSleepHrs];


        $moodData = Mood::selectRaw('mood, date')->where('user_id', auth()->id())->get();

        $arrayGaugeChart[] = ['date', 'mood'];
        //$arrayGaugeChart[1] = [$moodData[sizeof($moodData) - 1]->date, $moodData[sizeof($moodData) - 1]->mood];
        $arrayGaugeChart[1] = ["Mood", $moodData[sizeof($moodData) - 1]->mood];

        $weightData = Weight::selectRaw('weight, date')->where('user_id', auth()->id())->get();
        $arrayLineChart[] = ['date', 'weight'];
        foreach ($weightData as $key => $value) {
            $arrayLineChart[++$key] = [$value->date, (float) $value->weight];
        }

        $longestWorkout = DB::table('users')->join('activities', 'users.id', '=', 'activities.user_id')->join('workouts', 'activities.id', '=', 'workouts.activity_id')->selectRaw('max(workouts.time) as time,activities.name')->groupBy('activities.name')->where('user_id', auth()->id())->orderBy('time','desc')->get()->first();
        $longestWorkoutTime = $longestWorkout->time;
        $longestWorkoutName = $longestWorkout->name;

        $furthestDistance = DB::table('users')->join('activities', 'users.id', '=', 'activities.user_id')->join('workouts', 'activities.id', '=', 'workouts.activity_id')->selectRaw('max(workouts.distance) as distance,activities.name')->groupBy('activities.name')->where('user_id', auth()->id())->orderBy('time','desc')->get()->first();

        $furthestDistanceKm = $furthestDistance->distance;
        $furthestDistanceName = $furthestDistance->name;


        $userWorkoutTime = DB::table('users')->join('activities', 'users.id', '=', 'activities.user_id')->join('workouts', 'activities.id', '=', 'workouts.activity_id')->selectRaw('sum(time) as time, date')->groupBy('date')->where('user_id', auth()->id())->get();

        $maxMinWorkoutTime = DB::table('users')->join('activities', 'users.id', '=', 'activities.user_id')->join('workouts', 'activities.id', '=', 'workouts.activity_id')->selectRaw('max(time) as max, min(time) as min, date')->groupBy('date')->where('user_id', '!=', auth()->id())->get();

        return view('home', compact('longestWorkoutTime', 'longestWorkoutName', 'furthestDistanceKm', 'furthestDistanceName','userWorkoutTime', 'maxMinWorkoutTime'))->with('name', json_encode($arrayPieChart))->with('date', json_encode($arrayBarChart))->with('sleep', json_encode($arraySleepGauge))->with('mood', json_encode($arrayGaugeChart))->with('weight', json_encode($arrayLineChart));
    }
}
