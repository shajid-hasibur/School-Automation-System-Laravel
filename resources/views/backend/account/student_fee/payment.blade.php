@section('title')
Student Payments
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>  
@endsection
@section('rightbar-content')
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Student Payment</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fee_category_id">Fee Type</label>
                                <select id="fee_category_id" name="fee_category_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_no">Student Id</label>
                                <input type="text" name="id_no" id="id_no" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="button" id="search" class="btn btn-success" style="margin-top: 31px;">Search</button>
                            </div>
                        </div>
                        <div class="col-md-12 d-none" id="alert">
                            <div class="alert alert-success col-md-7" role="alert" style="color:black;text-align:start">
                                No due payments found for this student in this fee type or fee is not requested yet.
                            </div>
                        </div>
                        <div class="d-none col-md-12 hiddendiv" id="due-payment">
                            <table class="table table-success table-bordered">
                                <thead class="table table-success">
                                    <tr>
                                        <th>#Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Fee Type</th>
                                        <th>Payment Of(Y-M-D)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="due-payment-table">
                                        
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none col-md-12 hiddendiv" id="due-exam-payment">
                            <table class="table table-success table-bordered">
                                
                                <thead class="table table-success">
                                    <tr>
                                        <th>#Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Fee Type</th>
                                        <th>Exam</th>
                                        <th>Payment Of(Y-M-D)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="due-exam-payment-table">
                                        
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-none" id="exam-payment-history">
                            <div class="col-md-12" style="margin-top: 100px">

                            </div>
                            <h4>Exam Fee</h4>
                            <table id="payment-history" class="table table-bordered">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>#Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>Class</th>
                                        <th>Fee Type</th>
                                        <th>Payment of(Y-M-D)</th>
                                        <th>Exam</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="exam-payment-history-tbody"></tbody>
                            </table>
                            <h4>Other Fee</h4>
                            <table id="payment-history" class="table table-bordered">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>#Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>Class</th>
                                        <th>Fee Type</th>
                                        <th>Payment of(Y-M-D)</th>
                                        {{-- <th>Exam</th> --}}
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="payment-history-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).on('click','#search',function(){
        let fee_category_id = $('#fee_category_id').val();
        let id_no = $('#id_no').val();
        
        $.ajax({
            url: "{{ route('get.student.invoice') }}",
            type: "GET",
            data:{
                'id_no':id_no,
                'fee_category_id': fee_category_id
            },
            success:function(response){
                // alert(fee_category_id);
                $('#exam-payment-history').removeClass('d-none');
                if(response.student_invoice == ''){
                    $('.hiddendiv').hide();
                    $('#alert').removeClass('d-none');
                }else{
                    $('.hiddendiv').show();
                    $('#alert').addClass('d-none');
                }
                let table = '';
                let exam_table = '';
                let examhistorytable = '';
                let historytable = '';

                    if(fee_category_id == 4){
                        $('#due-exam-payment').removeClass('d-none');
                        $('#due-payment').addClass('d-none');
                        $.each(response.student_invoice,function(key,value){
                            exam_table += '<tr>'+
                                        '<td>'+value.id+'</td>'+
                                        '<td>'+value.assign_student.student.name+'</td>'+
                                        '<td>'+value.assign_student.student.id_no+'</td>'+
                                        '<td>'+value.assign_student.student_year.year+'</td>'+
                                        '<td>'+value.assign_student.student_class.name+'</td>'+
                                        '<td>'+value.fee_category.name+'</td>'+
                                        '<td>'+value.exam_name.name+'</td>'+
                                        '<td>'+value.payment_for_date+'</td>'+
                                        '<td>'+value.status+'</td>'+
                                        '<td><button type="button" value="'+value.id+'" class="btn btn-danger btn-sm show">Take Payment</button></td>'
                                '</tr>';
                        });
                        exam_table = $('#due-exam-payment-table').html(exam_table);
                    }else{
                        $('#due-payment').removeClass('d-none');
                        $('#due-exam-payment').addClass('d-none');
                        $.each(response.student_invoice,function(key,value){
                        table += '<tr>'+
                                    '<td>'+value.id+'</td>'+
                                    '<td>'+value.assign_student.student.name+'</td>'+
                                    '<td>'+value.assign_student.student.id_no+'</td>'+
                                    '<td>'+value.assign_student.student_year.year+'</td>'+
                                    '<td>'+value.assign_student.student_class.name+'</td>'+
                                    '<td>'+value.fee_category.name+'</td>'+
                                    '<td>'+value.payment_for_date+'</td>'+
                                    '<td>'+value.status+'</td>'+
                                    '<td><button type="button" value="'+value.id+'" class="btn btn-danger btn-sm show">Take Payment</button></td>'
                                '</tr>';
                    });
                        table = $('#due-payment-table').html(table);
                }
                
                $.each(response.paid_exam_invoice,function(key,value){
                        examhistorytable += '<tr>'+
                                    '<td>'+value.invoice_id+'</td>'+
                                    '<td>'+value.assign_student.student.name+'</td>'+
                                    '<td>'+value.assign_student.student.id_no+'</td>'+
                                    '<td>'+value.assign_student.student_class.name+'</td>'+
                                    '<td>'+value.invoice.fee_category.name+'</td>'+
                                    '<td>'+value.invoice.payment_for_date+'</td>'+
                                    '<td>'+value.invoice.exam_name.name+'</td>'+
                                    '<td>'+value.payment_date+'</td>'+
                                    '<td>'+value.invoice.status+'</td>'
                                '</tr>';
                    });
                    examhistorytable = $('#exam-payment-history-tbody').html(examhistorytable);

                        $.each(response.paid_invoice,function(key,value){
                            historytable += '<tr>'+
                                    '<td>'+value.invoice_id+'</td>'+
                                    '<td>'+value.assign_student.student.name+'</td>'+
                                    '<td>'+value.assign_student.student.id_no+'</td>'+
                                    '<td>'+value.assign_student.student_class.name+'</td>'+
                                    '<td>'+value.invoice.fee_category.name+'</td>'+
                                    '<td>'+value.invoice.payment_for_date+'</td>'+
                                    // '<td>'+""+'</td>'+
                                    '<td>'+value.payment_date+'</td>'+
                                    '<td>'+value.invoice.status+'</td>'
                                '</tr>';
                    });
                        historytable = $('#payment-history-tbody').html(historytable);        
            }

        });
    });

    $(document).on('click','.show',function(){
        let invoiceId = $(this).val();
        let route = "{{ route('get.payment.invoice',":invoiceId") }}";
        route = route.replace(':invoiceId',invoiceId);
        window.location=route;
    });    
</script>    
@endsection
