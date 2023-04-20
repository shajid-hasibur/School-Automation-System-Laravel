<?php

namespace App\Http\Controllers;

use App\Models\AccountStudentFee;
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
        // dd($request->all());
        $data = new AccountStudentFee();
        $data->year_id = $request->year_id;
        $data->class_id = $request->class_id;
        $data->student_id = $request->student_id;
        $data->fee_category_id = $request->fee_category_id;
        $data->exam_type_id = $request->exam_type_id;
        $data->date = $request->date;
        $data->payment_date = now();
        $data->amount = $request->amount;
        $data->save();

        $notification = array(
            'message' => 'Payment data successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //return the payment history view
    public function index(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fees'] = FeeCategory::all();
        return view('backend.account.student_fee.payment_history',$data);
    }

    public function studentData(Request $request){
        // dd($request->all());
        $exam_fee = '';
        $student_account = '';
        $user_data = User::where('id_no',$request->id_no)->first();
        $student_data = AccountStudentFee::with('student','student_class','student_year','fee_category','discount','assigned_student')
        ->where('year_id',$request->year_id)
        ->where('class_id',$request->class_id)
        ->where('fee_category_id',$request->fee_category_id)
        ->whereYear('date',$request->year)
        ->where('student_id',$user_data->id)
        ->first();

        if($request->fee_category_id == 2){
            $student_account = AccountStudentFee::where('year_id',$request->year_id)
            ->where('class_id',$request->class_id)
            ->where('student_id',$user_data->id)
            ->where('fee_category_id',$request->fee_category_id)
            ->whereYear('date',$request->year)
            ->selectRaw('year(date) year, monthname(date) month, count(*) data,payment_date pdate, amount pamount')
            ->groupBy('year', 'month','pdate','pamount')
            ->get();
        }

        if($request->fee_category_id == 4){
            $exam_fee = AccountStudentFee::with('exam_type')->select('exam_type_id','payment_date','amount')
            ->where('class_id',$request->class_id)
            ->where('student_id',$user_data->id)
            ->where('fee_category_id',$request->fee_category_id)
            ->whereYear('date',$request->year)
            ->get();
            
        }
        $other_fee = AccountStudentFee::where('class_id',$request->class_id)
        ->where('student_id',$user_data->id)
        ->where('fee_category_id',$request->fee_category_id)
        ->whereYear('date',$request->year)
        ->selectRaw('year(date) otherfeeyear, payment_date otherfeedate,amount otherfeeamount')
        ->get();
        
        return response()->json([
            'student' => $student_data,
            'student_acc' => $student_account,
            'exam_fee' => $exam_fee,
            'other_fee' => $other_fee,
        ]);
    }
}
