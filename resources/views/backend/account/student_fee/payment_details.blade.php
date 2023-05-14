@section('title')
Student Fee Details
@endsection
@extends('backend.layouts.master')
@section('style')
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
                    <div class="d-flex">
                            <div class="col-md-6">
                                <h4 style="background-color: yellowgreen;text-align:center">Payment Information</h4>
                                <span><strong>InvoiceNo : {{ "#".$invoice['id'] }}</strong></span><br>
                                <span><strong>Invoice Generation Date: {{ $invoice['created_at'] }}</strong></span><br>
                                <span><strong>Fee Category : {{ $invoice['fee_category']['name'] }}</strong></span><br>
                                @if ($invoice['fee_category_id'] == '2')
                                <span><strong>Payment of : {{ carbon\carbon::parse($invoice->payment_for_date)->format('F Y') }}</strong></span><br>
                                @else
                                <span><strong>Payment of : {{ carbon\carbon::parse($invoice->payment_for_date)->format('Y') }}</strong></span><br>   
                                @endif
                                @if ($invoice['fee_category_id'] == '4')
                                <span><strong>Exam Type : {{ $invoice['exam_name']['name'] }}</strong></span><br>
                                @endif
                                <span><strong>Fee Amount : {{ $fee_amount['amount']."/-" ." BDT" }}</strong></span><br>
                                <span><strong>Discount : {{ $invoice['assign_student']['discount']['discount'] ."%"}}</strong></span><br>
                                <span><strong>Discount Amount : {{ $discount_amount."/-"." BDT" }}</strong></span><br>
                                <span><strong>Amount For This Student : {{ $payable_amount."/-"." BDT" }}</strong></span><br>
                            </div>
                            <div class="col-md-6">
                                <h4 style="background-color: yellowgreen;text-align:center">Student Information</h4>
                                <span><strong>Student Name : {{ $invoice['assign_student']['student']['name'] }}</strong></span><br>
                                <span><strong>Father Name : {{ $invoice['assign_student']['student']['fname'] }}</strong></span><br>
                                <span><strong>Student Id : {{ $invoice['assign_student']['student']['id_no'] }}</strong></span><br>
                                <span><strong>Student Class : {{ $invoice['assign_student']['student_class']['name'] }}</strong></span><br>
                                <span><strong>Student Year : {{ $invoice['assign_student']['student_year']['year'] }}</strong></span><br>
                            </div>    
                    </div>
                    <br><div class="col-md-12">
                        <button class="btn btn-primary">Confirm Payment</button>
                    </div>
                </div>        
            </div>        
        </div>    
    </div>           
</div>                     
@endsection