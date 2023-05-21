<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function index(){
        $data['fees'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        $data['exams'] = ExamType::all();
        return view('backend.account.student_fee.status',$data);
    }

    public function getPaymentData(Request $request){

        if($request->fee_category_id == '4'){
            $request->validate([
                'fee_category_id' => 'required',
                'class_id' => 'required',
                'exam_type_id' => 'required',
            ],[
                'fee_category_id.required' => 'Please select a fee type',
                'class_id.required' => 'Please select a class',
                'exam_type_id.required' => 'Please select a exam for this fee type'
            ]);
        }else{
            $request->validate([
                'fee_category_id' => 'required',
                'class_id' => 'required'
            ],[
                'fee_category_id.required' => 'Please select a fee type',
                'class_id.required' => 'Please select a class'
            ]);
        }

        
    }
}
