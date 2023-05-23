<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\Invoice;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function index(){
        $data['fees'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        $data['exams'] = ExamType::all();
        $data['invoices'] = Invoice::with('assign_student.student')
        ->with('assign_student.student_class')
        ->with('fee_category')
        ->where('fee_category_id',1)
        ->where('class_id',10)
        ->get();
        return view('backend.account.student_fee.status',$data);
    }

    public function getPaymentData(Request $request){
        $data['fees'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        $data['exams'] = ExamType::all();
        $data['invoices'] = '';

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

        if($request->fee_category_id != '4'){

            $data['invoices'] = Invoice::with('assign_student.student')
            ->with('assign_student.student_class')
            ->with('fee_category')
            ->where('fee_category_id',$request->fee_category_id)
            ->where('class_id',$request->class_id)
            ->get();
        }
        if($request->fee_category_id == '4'){

            $data['invoices'] = Invoice::with('assign_student.student')
            ->with('assign_student.student_class')
            ->with('fee_category','exam_name')
            ->where('fee_category_id',$request->fee_category_id)
            ->where('class_id',$request->class_id)
            ->where('exam_type_id',$request->exam_type_id)
            ->get();
        }

        $element = count($data['invoices']);
        // dd($element);
        // dd($data['invoices']->toArray());
        $notification = array(
            'message' => 'No invoices found in this criteria or payment is not requested yet!',
            'alert-type' => 'warning'
        );

        if($element == '0'){
            return redirect()->back()->with($notification);
        }
        else{
            return view('backend.account.student_fee.status',$data);
        }
        
    }
}
