<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    //
    public function GetSubjects(Request $request)
    {
        $class_id = $request->class_id;
        $subjects = AssignSubject::with(['subject'])->where('class_id', $class_id)->get();
        return response()->json($subjects);

        // $class_id = $request->class_id;
        // $subjects = AssignSubject::with(['subject'])->whereHas('subject',function($query){
        //     $query->where('flag',null);
        // })->where('class_id', $class_id)->get();
        // return response()->json($subjects);
    }

    //
    public function GetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $students = AssignStudent::with(['student'])->where('year_id', $year_id)->where('class_id', $class_id)->get();
        return response()->json($students);
    }

    public function AllStudents()
    {
        $students = count(AssignStudent::all());
        return response()->json($students);
    }

    public function AttendanceGetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $shift_id = $request->shift_id;
        $section_id = $request->section_id;
        $students = AssignStudent::with(['student','student_attendance'])->where('year_id', $year_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('shift_id', $shift_id)->get();
        dd($students);
        return response()->json($students);

    }
}
