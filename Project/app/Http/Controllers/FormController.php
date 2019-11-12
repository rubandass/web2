<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Alcohol;
use App\Workout;
use App\Item;
use App\Snack;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeAcitivy(Request $request)
    {
        
        $workout = new Workout();
        $workout->distance = $request->get('distance');
        $workout->start_time = $request->get('start_time');
        $workout->end_time = $request->get('end_time');
        $workout->date = $request->get('date');
        $workout->activity_id = $request->get('activity');
        $workout->save();
        return redirect('/activity')->with('success', 'Activity has been added');
    }

    public function storeAlcohol(Request $request)
    {
        
        $alcohol = new Alcohol();
        $alcohol->standard_drink = $request->get('drink_number');
        //kJ = calories * 4.184;
        if ($request->get('calorie') == null) {
            $calories = $request->get('kj') / 4.184;
            $kj = $request->get('kj');
        } else {
            $kj = $request->get('calorie') * 4.184;
            $calories = $request->get('calorie');
        }
        
        $alcohol->calories = $calories;
        $alcohol->kj = $kj;
        $alcohol->date = $request->get('date');
        $alcohol->item_id = $request->get('item_name');
        $alcohol->save();
        return redirect('/alcohol')->with('success', 'Alcohol details has been added');
    }

    public function storeSnack(Request $request)
    {
        $snack = new Snack();
        //kJ = calories * 4.184;
        if ($request->get('calorie') == null) {
            $calories = $request->get('kj') / 4.184;
            $kj = $request->get('kj');
        } else {
            $kj = $request->get('calorie') * 4.184;
            $calories = $request->get('calorie');
        }
        
        $snack->calories = $calories;
        $snack->kj = $kj;
        $snack->date = $request->get('date');
        $snack->item_id = $request->get('item_name');
        $snack->save();
        return redirect('/snack')->with('success', 'Snack details has been added');
    }

    public function result()
    {
        $workouts = Workout::all()->sortBy('date');
        $totalWorkoutDistance = Workout::sum('distance');
        $totalWorkoutTime = 0;
        //$totalWorkoutTime = Workout::get('start_time');
        $start_time = Workout::get('start_time');
        for ($i=0; $i < sizeof($start_time); $i++) { 
            $jsonArrayStartTime = json_decode($start_time);
            $starttime = $jsonArrayStartTime[$i]->start_time;
            $end_time = Workout::get('end_time');
            $jsonArrayEndTime = json_decode($end_time);
            $endtime = $jsonArrayEndTime[$i]->end_time;
            $startTime = strtotime($starttime);
            $endTime = strtotime($endtime);
            $diffTime = $endTime - $startTime;
            $totalWorkoutTime += $diffTime / 60 / 60;
        }
        
        return view('results', compact('workouts', 'totalWorkoutDistance', 'totalWorkoutTime'));
    }

    public function addActivity(Request $request)
    {
        $activity = new Activity();
        $activity->name = $request->get('activityName');
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect('activity');
    }

    public function addItem(Request $request)
    {
        $item = new Item();
        $item->name = $request->get('item_name');
        //dd($request->get('item'));
        if ($request->get('item') == "alcohol") {
            $item->category = "alcohol";
        } else {
            $item->category = "snack";
        }
        
        $item->user_id = Auth::user()->id;
        $item->save();
        if ($request->get('item') == "alcohol") {
            return redirect('alcohol');
        } else {
            return redirect('snack');
        }
        
    }

    public function workout()
    {
        $activities = Activity::all()->sortBy('name');
        //dd($activities);
        return view('workoutentry', compact('activities'));
    }

    public function activityEntry()
    {
        $activities = Activity::all()->sortBy('name');
        $workouts = Workout::all()->sortBy('date');
        $totalWorkoutDistance = Workout::sum('distance');
        $totalWorkoutTime = 0;
        //$totalWorkoutTime = Workout::get('start_time');
        $start_time = Workout::get('start_time');
        for ($i=0; $i < sizeof($start_time); $i++) { 
            $jsonArrayStartTime = json_decode($start_time);
            $starttime = $jsonArrayStartTime[$i]->start_time;
            $end_time = Workout::get('end_time');
            $jsonArrayEndTime = json_decode($end_time);
            $endtime = $jsonArrayEndTime[$i]->end_time;
            $startTime = strtotime($starttime);
            $endTime = strtotime($endtime);
            $diffTime = $endTime - $startTime;
            $totalWorkoutTime += $diffTime / 60 / 60;
        }
        return view('activity', compact('activities','workouts', 'totalWorkoutDistance', 'totalWorkoutTime'));
    }

    public function alcoholEntry()
    {
        $alcohols = Alcohol::all();
        $items = Item::where('category', 'alcohol')->get()->sortBy('name');
        return view('alcohol', compact('alcohols','items'));
    }

    public function snackEntry()
    {
        $snacks = Snack::all();
        $items = Item::where('category', 'snack')->get()->sortBy('name');
        return view('snack', compact('snacks','items'));
    }

    public function itemEntry()
    {
        $items = Item::all()->sortBy('name');
        return view('alcohol', compact('items'));
    }
}
