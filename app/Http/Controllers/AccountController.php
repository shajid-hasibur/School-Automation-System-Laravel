<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\Invoice;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentPayment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index(){
        $data['classes'] = StudentClass::all();
        $data['fees'] = FeeCategory::all();
        $data['exams'] = ExamType::all();
        return view('backend.request_payment.index',$data);
    }

    public function store(Request $request){
        // dd($request->all());
        $found = '';
        $fee_type = $request->fee_category_id;
       
        if($fee_type == '4'){
            $request->validate([
                'exam_type_id' => 'required',
                'class_id' => 'required',
                'fee_category_id' => 'required',
                'payment_for_date' => 'required'
            ],
            [
                'exam_type_id.required' => 'Please select a exam type for this fee type',
                'payment_for_date.required' => 'Please provide a date'
            ]);
        }else{
            $request->validate([
                'class_id' => 'required',
                'fee_category_id' => 'required',
                'payment_for_date' => 'required'
            ],
            [
                'class_id.required' => 'Please select a class',
                'fee_category_id.required' => 'Please select a fee type',
                'payment_for_date.required' => 'Please provide a date'
            ]);
        }
        
        $students = AssignStudent::with('student')->where('class_id',$request->class_id)->get();
        $total_students = count($students);

        
        $currentDate = Carbon::now();
        $userGivenDate = Carbon::parse($request->payment_for_date);
        // dd($userGivenDate);
        // $month = $currentDate->format('F');
        if($fee_type == '4'){

            $found = Invoice::where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)
            ->where('exam_type_id',$request->exam_type_id)
            ->whereYear('payment_for_date',$userGivenDate)
            ->count();
            // dd($found);
                   
        }elseif($fee_type != '4' && $fee_type != '2'){
            $found = Invoice::where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)
            ->whereYear('payment_for_date',$userGivenDate)
            ->count();
            // dd($found);

        }elseif($fee_type == '2'){
            $found = Invoice::where('class_id',$request->class_id)
            ->where('fee_category_id',$request->fee_category_id)
            ->whereYear('payment_for_date',$userGivenDate)
            ->whereMonth('payment_for_date',$userGivenDate)
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
                $data->payment_for_date = $request->payment_for_date;
                $data->status = "Due";
                $data->save();
            }
    
            $notification = array(
                'message' => 'Student fee is requested for the selected class and given date',
                'alert-type' => 'success'
            );
            return redirect()->route('request.payment')->with($notification);
        }else{
            $notification2 = array(
                'message' => 'Student payment already requested for selected class or fee type or exam type or given date',
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

        $PaidInvoice = StudentPayment::with('invoice.fee_category')
        ->with('assign_student.student')
        ->with('assign_student.student_class')
        ->whereRelation('invoice','exam_type_id','=',null)
        ->where('student_id',$userData->id)
        ->get();

        $PaidExamInvoice = StudentPayment::with('invoice.fee_category')
        ->with('assign_student.student')
        ->with('assign_student.student_class')
        ->with('invoice.exam_name')->has('invoice.exam_name')
        ->where('student_id',$userData->id)
        ->get();
        // dd($PaidInvoice);

        return response()->json([
            'student_invoice' => $studentInvoice,
            'paid_invoice' => $PaidInvoice,
            'paid_exam_invoice' => $PaidExamInvoice
        ]);
    }

    public function getPaymentInvoice($id){
        $invoice = Invoice::with('assign_student.student')
        ->with('assign_student.student_class')
        ->with('assign_student.student_year')
        ->with('assign_student.discount')
        ->with('fee_category')
        ->with('exam_name')
        ->findOrFail($id);

        $fee_amount = FeeCategoryAmount::select('amount')
        ->where('fee_category_id',$invoice->fee_category_id)
        ->where('class_id',$invoice->class_id)->first();
        
        $original_amount = $fee_amount->amount;
        $discount = $invoice['assign_student']['discount']['discount'];
        $discount_amount = $discount / 100 * $original_amount;
        $payable_amount = (int)$original_amount - (int)$discount_amount;
        
        return view('backend.account.student_fee.payment_details',compact('invoice','fee_amount','discount_amount','payable_amount'));
    }

    public function storePayment(Request $request, $id){
        
        DB::transaction(function () use($request,$id){
            $invoice = Invoice::findOrFail($id);
            $invoice->status = "Paid";
            $invoice->update();
            $payment = new StudentPayment();
            $payment->invoice_id = $invoice->id;
            $payment->student_id = $invoice->student_id;
            $payment->amount = $request->amount;
            $payment->payment_date = now();
            $payment->save();
        });

        $notification = array(
            'message' => 'Student payment is successfully taken',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.page')->with($notification);
    }

    public function recent_pay_view(){
        $today = Carbon::now();
        $day = $today->format('d');
        $PaidInvoice = StudentPayment::with('assign_student')
        ->with('assign_student.student')
        ->with('assign_student.student_class')
        ->with('invoice.fee_category')
        ->whereDay('payment_date',$day)
        ->get();
        $total_amount_collected = StudentPayment::whereDay('payment_date',$day)->sum('amount');
        $total_payments = $PaidInvoice->count();
        $heading = "Todays Fee Collections";
        // dd($total_amount_collected);
        return view('backend.account.student_fee.recent_pay',compact('PaidInvoice','heading','total_amount_collected','total_payments'));
    }

    public function getPayments(){
        $today = Carbon::now();
        $month = $today->format('m');
        $PaidInvoice = StudentPayment::with('assign_student')
        ->with('assign_student.student')
        ->with('assign_student.student_class')
        ->with('invoice.fee_category')
        ->whereMonth('payment_date',$month)
        ->get();
        $total_amount_collected = StudentPayment::whereMonth('payment_date',$month)->sum('amount');
        $total_payments = $PaidInvoice->count();
        $heading = "Current Month Collections";
        // dd($total_payments);
        return view('backend.account.student_fee.recent_pay',compact('PaidInvoice','heading','total_amount_collected','total_payments'));
    }

    




}
