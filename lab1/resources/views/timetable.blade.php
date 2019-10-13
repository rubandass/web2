@extends('layout')
@section('title','Timetable')
@section('timetable_class','active')
@section('content')
<h2>Timetable</h2>
<table>
    <tr>
        <th>Day</th>
        <th class="daysTime">8.00-10.00</th>
        <th class="daysTime">10.00-12.00</th>
        <th class="daysTime">12.00-1.00</th>
        <th class="daysTime">1.00-3.00</th>
        <th class="daysTime">3.00-5.00</th>
    </tr>
    <tr>
        <td class="daysTime">Monday</td>
        <td></td>
        <td class="linux">Linux 312</td>
        <td>Lunch</td>
        <td></td>
        <td class="web2">Web2 D202</td>
    </tr>
    <tr>
        <td class="daysTime">Tuesday</td>
        <td></td>
        <td class="multimedia">Multimedia Development D207</td>
        <td>Lunch</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="daysTime">Wednesday</td>
        <td class="linux">Linux 312</td>
        <td></td>
        <td>Lunch</td>
        <td></td>
        <td class="web2">Web2 D202</td>
    </tr>
    <tr>
        <td class="daysTime">Thursday</td>
        <td class="multimedia">Multimedia Development D207</td>
        <td class="professionalPractice">Professional Practice 2 D314</td>
        <td>Lunch</td>
        <td class="professionalPractice">Professional Practice 2 D314</td>
        <td></td>
    </tr>
    <tr>
        <td class="daysTime">Friday</td>
        <td></td>
        <td></td>
        <td>Lunch</td>
        <td></td>
        <td></td>
    </tr>
</table>
@endsection