<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class FormController extends Controller
{
    public function showOlympic()
    {
        return view('olympics');
    }

    public function processOlympic()
    {
        $formData = request()->all();
        return view('processingOlympics', compact('formData'));
    }

    public function mark()
    {
        //$formData = request()->all();
     
        $nations = request()->input('numberOfCountries');
        $next = request()->input('nextOlympicCountry',"missing country");
        $notTopThree = request()->input('secondCountry',"missing country");
        $kiwiSportsArray = request()->input('events',[]);
        $medalSport = request()->input('wonSport',"missing sport");

        $score = 0;

        $answers = array();
        $ansNations = array();
        $ansNext = array();
        $ansTop = array();
        $ansKiwi = array();
        $ansMedal = array();

        array_push($ansNations, "How many countries were in the 2018 Winter Olympics?");

        if ($nations == 92) {
            $nationAnswer = "correct";
            $score++;
        } 
        elseif ($nations == null) {
            $nationAnswer = "Incorrect";
            $nations = "Nation missing";
        }
        else {
            $nationAnswer = "Incorrect";
        }
        array_push($ansNations, $nations);

        array_push($ansNations, $nationAnswer);

        array_push($ansNext, "The next Winter Olympics are in");
        array_push($ansNext, $next);
        if ($next == "china") {
            $nextCountry = "correct";
            $score++;
        } else {
            $nextCountry = "Incorrect";
        }
        array_push($ansNext, $nextCountry);

        array_push($ansTop, "Which country was not in the top 3 medal count in the 2018 Olympics?");
        array_push($ansTop, $notTopThree);
        if ($notTopThree == "russia") {
            $notThreeCountry = "correct";
            $score++;
        } else {
            $notThreeCountry = "Incorrect";
        }
        array_push($ansTop, $notThreeCountry);

        //Create array of correct events
        $ansKiwiSportsArray = array();
        $correctEvents = array("AlpineSkiing", "Skeleton", "FreestyleSkiing", "SnowBoarding", "SpeedSkating");
        array_push($ansKiwi, "Which four events did New Zealanders complete in at the 2018 Winter Olympics?");
        
        for ($i = 0; $i < count($kiwiSportsArray); $i++) {
            if (in_array($kiwiSportsArray[$i], $correctEvents)) {
                array_push($ansKiwiSportsArray,"correct");
                $score++;
            }
            else {
                array_push($ansKiwiSportsArray,"Incorrect");
                $score -= 0.5;
            }
        }

        for ($i = 0; $i < count($correctEvents); $i++) {
            if (!in_array($correctEvents[$i], $kiwiSportsArray)) {
                array_push($kiwiSportsArray, "missing " . $correctEvents[$i]);
                array_push($ansKiwiSportsArray,"Incorrect");
                $score -= 0.5;
            }
        }
        array_push($ansKiwi, $kiwiSportsArray);
        array_push($ansKiwi, $ansKiwiSportsArray);

        array_push($ansMedal, "New Zealand had only ever won one medal in the Winter Olympics before 2018 it was in what sport?");
        if ($medalSport == "AlpineSkiing") {
            $ansSport = "correct";
            $score++;
        } 
        elseif ($medalSport == "noSelection") {
            $medalSport = "missing sport";
            $ansSport = "Incorrect";
        }
        else {
            $ansSport = "Incorrect";
        }
        array_push($ansMedal, $medalSport);

        array_push($ansMedal, $ansSport);

        array_push($answers, $ansNations);
        array_push($answers, $ansNext);
        array_push($answers, $ansTop);
        array_push($answers, $ansKiwi);
        array_push($answers, $ansMedal);

        return view('markedPage', compact('answers', 'score'));
    }

    public function showFruit()
    {
        return view('fruit');
    }

    public function processFruit()
    {
        $formData = request()->all();
        return view('processingFruit', compact('formData'));
    }

    public function showFruit2()
    {
        return view('fruit2');
    }

    public function processFruit2()
    {
        $formData = request()->all();
        return view('processingFruit', compact('formData'));
    }
}
