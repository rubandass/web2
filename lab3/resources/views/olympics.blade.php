@extends('layout')
@section('title','Olympics')
@section('olympics_class','active')
@section('content')


<form method="post" action="/olympics">
    {{csrf_field()}}
    <h2>Winter Olympic Quiz</h2>
    <fieldset>
        <legend>Quiz Items</legend>
        <label>How many countries were in the 2018 Winter Olympics?<input type="text" name="numberOfCountries" /></label><br><br>

        <label>The next Winter Olympics are in</label><br><br>

        <input type="radio" name="nextOlympicCountry" value="canada">Canada<br>
        <input type="radio" name="nextOlympicCountry" value="italy">Italy<br>
        <input type="radio" name="nextOlympicCountry" value="russia">Russia<br>
        <input type="radio" name="nextOlympicCountry" value="china">China<br><br>

        <label>Which country was <b>not</b> in the top 3 medal count in the 2018 Olympics?</label><br><br>

        <div class="image-container">
            <div>
                <input type="radio" name="secondCountry" value="canada">
                <label><img src="/images/canada.gif" alt="canada"></label>
            </div>
            <div>
                <input type="radio" name="secondCountry" value="norway">
                <label><img src="/images/norway.gif" alt="norway"></label>
            </div>
            <div>
                <input type="radio" name="secondCountry" value="russia">
                <label><img src="/images/russia.gif" alt="russia"></label>
            </div>
            <div>
                <input type="radio" name="secondCountry" value="germany">
                <label><img src="/images/germany.gif" alt="germany"></label>
            </div>
        </div>
        <br>
        <div>

            <label>Which four events did New Zealanders complete in at the 2018 Winter Olympics?</label><br><br>

            <input type="checkbox" name="events[]" value="AlpineSkiing">Alpine Skiing<br>
            <input type="checkbox" name="events[]" value="Skeleton">Skeleton<br>
            <input type="checkbox" name="events[]" value="FreestyleSkiing">Freestyle Skiing<br>
            <input type="checkbox" name="events[]" value="FigureSkating">Figure Skating<br>
            <input type="checkbox" name="events[]" value="SnowBoarding">Snow Boarding<br>
            <input type="checkbox" name="events[]" value="SpeedSkating">Speed Skating<br><br><br>

        </div>

        <div>
            <label>New Zealand had only ever won one medal in the Winter Olympics before 2018 it was in what sport?</label><br><br>
            <select name="wonSport">
                <option value="noSelection">Please select a sport</option>
                <option value="Cricket">Cricket</option>
                <option value="Rugby">Rugby</option>
                <option value="Snowboarding">Snowboarding</option>
                <option value="Swimming">Swimming</option>
                <option value="AlpineSkiing">Alpine Skiing</option>
            </select>
        </div>

    </fieldset>
    <br><br>
    <input type="submit" name="submit" value="Submit">

</form>

@endsection