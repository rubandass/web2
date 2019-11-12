<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    public function createEvent()
    {
        return view('createevent');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->get('title');
        $event->start_date = $request->get('start_date');
        $event->end_date = $request->get('end_date');
        $event->save();
        return redirect('event')->with('success', 'Event has been added');
    }

    public function calendar()
    {
        $events = [];
        $data = Event::all(); //,'red','green','purple'
        $colorArray = ['magenta', 'blue', 'red', 'green', 'purple'];
        $colorCount = 0;
        $totalColors = count($colorArray);
        if ($data->count()) {
            /*foreach ($data as $key => $value) {
                //create a switch on $value->title that gives different activities different colours
                $color = $colorArray[0];
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.'+1 day'),
                    null,
                    //add color
                    [
                        'color' => $colorArray[$colorCount],
                        'textColor' => 'white'
                    ]

                );
                $colorCount++;
                if ($colorCount == $totalColors) {
                    $colorCount = 0;
                }

            }*/

            foreach ($data as $key => $value) {
                //create a switch on $value->title that gives different activities different colours
                switch ($value->title) {
                    case 'Yoga':
                        $color = 'red';
                        break;
                    case 'Soccer':
                        $color = 'blue';
                        break;
                    case 'Swimming':
                        $color = 'pink';
                        break;
                    case 'Running':
                        $color = 'green';
                        break;
                    case 'Music':
                        $color = 'purple';
                        break;
                    case 'Cricket':
                        $color = 'yellow';
                        break;
                    default:
                        # code...
                        break;
                }
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date . '+1 day'),
                    null,
                    //add color
                    [
                        'color' => $color,
                        'textColor' => 'white'
                    ]

                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('calendar', compact('calendar'));
    }
}
