<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function AddStudent()
    {
        /*$student = new Student();
        $student->firstName = "Dale";
        $student->lastName = "Parson";
        $student->save();

        $course=Course::find([2,3]);
        $student->courses()->attach($course);

        $student = new Student();
        $student->firstName = "Joy";
        $student->lastName = "Gasson";
        $student->save();

        $course=Course::find([1,2]);
        $student->courses()->attach($course);

        $student = new Student();
        $student->firstName = "Elise";
        $student->lastName = "Allen";
        $student->save();

        $course=Course::find([1,4]);
        $student->courses()->attach($course);

        $student = new Student();
        $student->firstName = "Krissi";
        $student->lastName = "Wood";
        $student->save();

        $course=Course::find([1,2,3,4]);
        $student->courses()->attach($course);*/


        $student = Student::where('firstName', 'Joy')->orWhere ('lastName','Gasson')->first();
        $course = Course::find([1, 2]);
        $student->courses()->detach($course); 


        $students = Student::all()->sortBy('lastName');
        $courses = Course::all()->sortBy('name');
        return view('showAll', compact('students', 'courses'));
    }
}
