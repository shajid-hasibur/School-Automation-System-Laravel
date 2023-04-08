<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\User;

class PaymentController extends Controller
{
    public function create(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fees'] = FeeCategory::all();
        $data['exams'] = ExamType::all();
        return view('backend.account.student_fee.payment_create',$data);
    }

    public function searchStudent(Request $request){

        $feeAmount = FeeCategoryAmount::with('fee_category')->where('fee_category_id',$request->fee_category_id)
        ->where('class_id',$request->class_id)
        ->first();
        $user_data = User::where('id_no',$request->id_no)->first();
        $student_data = AssignStudent::with('student','student_class','student_year','group','discount')
        ->where('year_id',$request->year_id)
        ->where('class_id',$request->class_id)
        ->where('student_id',$user_data->id)
        ->first();
        $original_amount = $feeAmount->amount;
        $discount = $student_data['discount']['discount'];
        $discount_amount = $discount / 100 * $original_amount;
        $final_amount = (int)$original_amount - (int)$discount_amount;
        return response()->json([
            'student' => $student_data,
            'feeAmount' => $feeAmount,
            'discount_amount' => $discount_amount,
            'final_amount' => $final_amount,
        ]);
    }

    public function feeData(Request $request){

        $fee_category = FeeCategory::where('id',$request->fee_category_id)->first();
        return response()->json( $fee_category);
    }

    public function store(Request $request){
        dd($request->all());
    }
}
