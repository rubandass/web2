<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Alcohol;
use App\Workout;
use App\Item;
use App\Snack;
use App\Sleep;
use App\Mood;
use App\User;
use App\Weight;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
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
        $workout->date = $request->get('date');
        $workout->activity_id = $request->get('activity');

        $time_hr = $request->get('time_hr') * 60;
        $time_min = $request->get('time_min');
        $workout->time = $time_hr + $time_min;

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

    public function storeSleep(Request $request)
    {
        $sleep = new Sleep();
        $sleep->date = $request->get('date');
        $sleep->time = $request->get('sleep_hours');
        $sleep->user_id = Auth::user()->id;
        $sleep->save();
        return redirect('/sleep')->with('success', 'Activity has been added');
    }

    public function storeMood(Request $request)
    {
        $mood = new Mood();
        $mood->date = $request->get('date');
        $mood->mood = $request->get('mood');
        $mood->user_id = Auth::user()->id;
        $mood->save();
        return redirect('/mood')->with('success', 'Activity has been added');
    }

    public function storeWeight(Request $request)
    {
        $weight = new Weight();
        $weight->date = $request->get('date');
        $weight->weight = $request->get('weight');
        $weight->user_id = Auth::user()->id;
        $weight->save();
        return redirect('/weight')->with('success', 'Activity has been added');
    }

    public function addActivity(Request $request)
    {
        $activity = new Activity();
        $activity->name = $request->get('activityName');
        $activity->color = $request->get('activityColor');
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect('activity');
    }

    public function addItem(Request $request)
    {
        $item = new Item();
        $item->name = $request->get('item_name');
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

        $totalTimeInMin = Workout::sum('time');
        $totalTimeInHr = $totalTimeInMin / 60;
        return view('activity', compact('activities', 'workouts', 'totalTimeInMin', 'totalWorkoutDistance'));
    }

    public function alcoholEntry()
    {
        $alcohols = Alcohol::all();
        $items = Item::where('category', 'alcohol')->get()->sortBy('name');
        return view('alcohol', compact('alcohols', 'items'));
    }

    public function snackEntry()
    {
        $snacks = Snack::all();
        $items = Item::where('category', 'snack')->get()->sortBy('name');
        return view('snack', compact('snacks', 'items'));
    }

    public function itemEntry()
    {
        $items = Item::all()->sortBy('name');
        return view('alcohol', compact('items'));
    }

    public function sleepEntry()
    {
        $sleeps = Sleep::all()->sortBy('date');
        $totalSleepHours = Sleep::sum('time');
        return view('sleep', compact('sleeps', 'totalSleepHours'));
    }

    public function moodEntry()
    {
        $moods = Mood::all()->sortBy('date');
        return view('mood', compact('moods'));
    }

    public function weightEntry()
    {
        $weights = Weight::all()->sortBy('date');
        return view('weight', compact('weights'));
    }

    public function calendar()
    {
        $events = [];
        $workouts = Workout::all();
        if ($workouts->count()) {
            foreach ($workouts as $workout) {
                $events[] = Calendar::event(
                    $workout->activity->name . " " . $workout->time . " " . "mins",
                    true,
                    new \DateTime($workout->date),
                    null,
                    null,
                    //add color
                    [
                        'color' => $workout->activity->color,
                        'textColor' => 'white'
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('calendar', compact('calendar'));
    }
}
