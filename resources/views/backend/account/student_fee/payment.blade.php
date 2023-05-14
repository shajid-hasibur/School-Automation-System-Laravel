@section('title')
Student Payments
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
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
                        <div class="d-none col-md-12" id="due-payment">
                            <table class="table table-success">
                                <thead class="table table-success">
                                    <tr>
                                        <th>#Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        {{-- <th>Roll</th> --}}
                                        <th>Fee Type</th>
                                        {{-- <th>Exam</th> --}}
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="due-payment-table">
                                        
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none col-md-12" id="due-exam-payment">
                            <table class="table table-success">
                                <thead class="table table-success">
                                    <tr>
                                        <th>#Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        {{-- <th>Roll</th> --}}
                                        <th>Fee Type</th>
                                        <th>Exam</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="due-exam-payment-table">
                                        
                                </tbody>
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
                let table = '';
                let exam_table = '';
               

                    if(fee_category_id == 4){
                        $('#due-exam-payment').removeClass('d-none');
                        $('#due-payment').addClass('d-none');
                        $.each(response,function(key,value){
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
                                        '<td><button type="button" value="'+value.id+'" class="btn btn-primary btn-sm show">Take Payment</button></td>'
                                '</tr>';
                        });
                        exam_table = $('#due-exam-payment-table').html(exam_table);
                    }else{
                        $('#due-payment').removeClass('d-none');
                        $('#due-exam-payment').addClass('d-none');
                        $.each(response,function(key,value){
                        table += '<tr>'+
                                    '<td>'+value.id+'</td>'+
                                    '<td>'+value.assign_student.student.name+'</td>'+
                                    '<td>'+value.assign_student.student.id_no+'</td>'+
                                    '<td>'+value.assign_student.student_year.year+'</td>'+
                                    '<td>'+value.assign_student.student_class.name+'</td>'+
                                    '<td>'+value.fee_category.name+'</td>'+
                                    '<td>'+value.payment_for_date+'</td>'+
                                    '<td>'+value.status+'</td>'+
                                    '<td><button type="button" value="'+value.id+'" class="btn btn-primary btn-sm show">Take Payment</button></td>'
                                '</tr>';
                    });
                        table = $('#due-payment-table').html(table);
                }
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