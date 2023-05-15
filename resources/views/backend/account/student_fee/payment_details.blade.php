@section('title')
Student Fee Details
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="{{ asset('backend/assets/js/base64logo.js') }}"></script>
<script>
    function download(){
       
        let sname = document.querySelector(".student-name").textContent;
        let fname = document.querySelector(".father-name").textContent;
        let s_id = document.querySelector(".student-id").textContent;
        let sclass = document.querySelector(".student-class").textContent;
        let syear = document.querySelector(".student-year").textContent;
        let invoiceNo = document.querySelector(".invoice-id").textContent;
        let feetype = document.querySelector(".fee-category").textContent;
        let paymentOfDate = document.querySelector(".payment-for-date").textContent;
        let examType = document.querySelector(".exam").value;
        let feeAmount = document.querySelector(".fee-amount").textContent;
        let discount = document.querySelector(".discount").textContent;
        let discountAmount = document.querySelector(".discount-amount").textContent;
        let paidAmount = document.querySelector(".amount-for-student").textContent;
        let printDate = new Date().toLocaleString();
        let onlyId = s_id.slice(13);
        
        let examLabel = "Exam Type : ";
        if(examType == ''){
             examLabel = "";
        }
        
        let doc = new jsPDF('p', 'mm', 'a6');
        doc.setFontSize(10);
        doc.addImage(logo, 'JPEG', 5, 4, 30, 25);
        doc.text(35, 10, "Unique Model School");
        doc.text(35, 15, "Address: Shahjadpur, Sirajganj");
        doc.text(35, 20, "Email: uniquemodelschool14@gmail.com");
        doc.text(35, 25, "Phone: 017299619595");
        doc.text(4,30,"...................................................................................................");
        doc.text(10, 40, invoiceNo);
        doc.text(10, 45, sname);
        doc.text(10, 50, fname);
        doc.text(10, 55, s_id);
        doc.text(10, 60, sclass);
        doc.text(10, 65, syear);
        doc.text(10, 70, feeAmount);
        doc.text(10, 75, discount);
        doc.text(10, 80, discountAmount);
        doc.text(10, 85, paidAmount);
        doc.text(10, 90, paymentOfDate);
        doc.text(10, 95, feetype);
        doc.text(10, 100,examLabel+examType);
        doc.text(50, 147, "Print Date : "+printDate);
        doc.save(onlyId+"_payment_slip.pdf");
        
    }
</script>   
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    {{-- <h5 class="card-title">Student Fee Information</h5> --}}
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('payment.store',$invoice['id']) }}" method="POST">
                        @csrf
                    <div class="d-flex">
                        <input type="hidden" id="invoice_id" name="invoice_id" value="{{ $invoice['id'] }}">
                        <input type="hidden" id="amount" name="amount" value="{{ $payable_amount }}">
                        <input type="hidden" class="exam" value="{{ @$invoice['exam_name']['name'] }}">
                            <div class="col-md-6">
                                <h4 style="background-color: yellowgreen;text-align:center">Payment Information</h4>
                                <span class="invoice-id"><strong>InvoiceNo : {{ "#".$invoice['id'] }}</strong></span><br>
                                <span class="invoice-generation"><strong>Invoice Generation Date: {{ $invoice['created_at'] }}</strong></span><br>
                                <span class="fee-category"><strong>Fee Category : {{ $invoice['fee_category']['name'] }}</strong></span><br>
                                @if ($invoice['fee_category_id'] == '2')
                                <span class="payment-for-date"><strong>Payment of : {{ carbon\carbon::parse($invoice->payment_for_date)->format('F Y') }}</strong></span><br>
                                @else
                                <span class="payment-for-date"><strong>Payment of : {{ carbon\carbon::parse($invoice->payment_for_date)->format('Y') }}</strong></span><br>   
                                @endif
                                @if ($invoice['fee_category_id'] == '4')
                                <span class="exam-type"><strong>Exam Type : {{ $invoice['exam_name']['name'] }}</strong></span><br>
                                @endif
                                <span class="fee-amount"><strong>Fee Amount : {{ $fee_amount['amount']."/-" ." BDT" }}</strong></span><br>
                                <span class="discount"><strong>Discount : {{ $invoice['assign_student']['discount']['discount'] ."%"}}</strong></span><br>
                                <span class="discount-amount"><strong>Discount Amount : {{ $discount_amount."/-"." BDT" }}</strong></span><br>
                                <span class="amount-for-student"><strong>Amount For This Student : {{ $payable_amount."/-"." BDT" }}</strong></span><br>
                            </div>
                            <div class="col-md-6">
                                <h4 style="background-color: yellowgreen;text-align:center">Student Information</h4>
                                <span class="student-name"><strong>Student Name : {{ $invoice['assign_student']['student']['name'] }}</strong></span><br>
                                <span class="father-name"><strong>Father Name : {{ $invoice['assign_student']['student']['fname'] }}</strong></span><br>
                                <span class="student-id"><strong>Student Id : {{ $invoice['assign_student']['student']['id_no'] }}</strong></span><br>
                                <span class="student-class"><strong>Student Class : {{ $invoice['assign_student']['student_class']['name'] }}</strong></span><br>
                                <span class="student-year"><strong>Student Year : {{ $invoice['assign_student']['student_year']['year'] }}</strong></span><br>
                            </div>    
                    </div>
                    <br><div class="col-md-12">
                        <button  class="btn btn-primary submit-btn" onclick="download()">Confirm Payment</button>
                    </div>
                </form>
                </div>        
            </div>        
        </div>    
    </div>
</div>                     
@endsection