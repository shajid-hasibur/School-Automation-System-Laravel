<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\Invoice;
use App\Models\User;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function index(){
        $data['classes'] = StudentClass::all();
        $data['fees'] = FeeCategory::all();
        $data['exams'] = ExamType::all();
        return view('backend.request_payment.index',$data);
    }

    public function store(Request $request){

        $found = '';
        $fee_type = $request->fee_category_id;
       
        if($fee_type == '4'){
            $request->validate([
                'exam_type_id' => 'required',
                'class_id' => 'required',
                'fee_category_id' => 'required'
            ],
            [
                'exam_type_id.required' => 'Please select a exam type for this fee type'
            ]);
        }else{
            $request->validate([
                'class_id' => 'required',
                'fee_category_id' => 'required'
            ],
            [
                'class_id.required' => 'Please select a class',
                'fee_category_id.required' => 'Please select a fee type'
            ]);
        }
        
        $students = AssignStudent::with('student')->where('class_id',$request->class_id)->get();
        $total_students = count($students);

        
        $currentDate = Carbon::now();
        // $month = $currentDate->format('F');
        if($fee_type != '2' && $fee_type != '4'){

            $found = Invoice::where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)
            ->whereYear('payment_for_date',$currentDate)
            ->count();
            // dd($found);
        }else if($fee_type == '2'){

            $found = Invoice::where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)
            ->whereYear('payment_for_date',$currentDate)
            ->whereMonth('payment_for_date',$currentDate)
            ->count();
            // dd($found);            
        }else if($fee_type == '4'){

            $found = Invoice::where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)
            ->where('exam_type_id',$request->exam_type_id)
            ->whereYear('payment_for_date',$currentDate)
            ->whereMonth('payment_for_date',$currentDate)
            ->count();
            // dd($found);
        }
        
        if($found == '0'){
            for($i = 0; $i < $total_students; $i++){
                $data = new Invoice();
                $data->student_id = $students[$i]['student_id'];
                $data->class_id = $students[$i]['class_id'];
                $data->fee_category_id = $request->fee_category_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->payment_for_date = now();
                $data->status = "Due";
                $data->save();
            }
    
            $notification = array(
                'message' => 'Student fee is requested for the selected class',
                'alert-type' => 'success'
            );
            return redirect()->route('request.payment')->with($notification);
        }else{
            $notification2 = array(
                'message' => 'Student payment already requested for selected class or fee type or exam type',
                'alert-type' => 'warning'
            );
            return redirect()->route('request.payment')->with($notification2);
        }

    }

    public function PaymentPage(){
        $data['fees'] = FeeCategory::all();
        return view('backend.account.student_fee.payment',$data);
    }

    public function GetInvoice(Request $request){
        $userData = User::where('id_no',$request->id_no)->first();

        $studentInvoice = Invoice::with('assign_student.student_class')
        ->with('assign_student.student_year')
        ->with('assign_student.student')
        ->with('fee_category','exam_name')
        ->where('student_id',$userData->id)
        ->where('fee_category_id',$request->fee_category_id)
        ->where('status','Due')
        ->get();

        return response()->json($studentInvoice);
    }

    




}
