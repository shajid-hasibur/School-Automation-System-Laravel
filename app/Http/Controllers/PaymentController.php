<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\User;

class PaymentController extends Controller
{
    public function create(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.account.student_fee.payment_create',$data);
    }

    public function searchStudent(Request $request){
        $user_data = User::where('id_no',$request->id_no)->first();
        $student_data = AssignStudent::with('student','student_class','student_year','group')
        ->where('year_id',$request->year_id)
        ->where('class_id',$request->class_id)
        ->where('student_id',$user_data->id)
        ->first();
        return response()->json($student_data);
    }
}
