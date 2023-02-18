<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentSection;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\SchoolSubject;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    //Class Routine View For Setup
    public function RoutineView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['sections'] = StudentSection::all();
        $data['shifts'] = StudentShift::all();
       return view('backend.setup.routine.routine_view', $data);

    }
    //Class Routine Create
    public function RoutineCreate()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['sections'] = StudentSection::all();
        $data['shifts'] = StudentShift::all();
        $data['subjects'] = SchoolSubject::all();
        $data['teachers'] = User::where('usertype', 'teacher')->get();
        $WEEK_DAYS = [
            '1' => 'Saturday',
            '2' => 'Sunday',
            '3' => 'Monday',
            '4' => 'Tuesday',
            '5' => 'Wednesday',
            '6' => 'Thursday',
            '7' => 'Friday',
            
        ];
        $data['weekdays'] = $WEEK_DAYS;
       return view('backend.setup.routine.routine_create', $data);
    }

       //Class Routine Store
    public function RoutineStore()
    {
        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $shift_id = $request->shift_id;
        $section_id = $request->section_id;
        $teacher_id = $request->class_teacher_id;
        $countDay = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_category_amount = new FeeCategoryAmount();
                $fee_category_amount->fee_category_id = $request->fee_category_id;
                $fee_category_amount->class_id = $request->class_id[$i];
                $fee_category_amount->amount = $request->amount[$i];
                $fee_category_amount->save();
            }
        }
        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('routine.view')->with($notification);

    }
}
