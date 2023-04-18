@section('title')
Student Payment History
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div>
                    <div class="card-header">
                        <h5 class="card-title">Search Student Payment</h5>
                    </div>
                    <div class="d-none col-md-6" id="alert">
                        <div class="alert alert-danger">
                            There is no payment found of this student in this category
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> --}}
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="year_id">Student Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fee_category_id">Fee Type</label>
                                <select id="fee_category_id" name="fee_category_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_no">Student Id</label>
                                <input type="text" name="id_no" id="id_no" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Payment Year</label>
                                <input type="text" id="year" name="year" class="yearpicker form-control" value="">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" id="search" class="btn btn-success" style="margin-top: 31px;">Search</button>
                            </div>
                        </div>
                        <div class="d-none" id="student-data">

                        </div>
                        <br><br><div class="d-none" id="payment-data">
                            <table class="table table-primary">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>Payment of Year</th>
                                        <th>Payment of Month</th>
                                        <th>Amount</th>
                                        <th>Date of Payment</th>
                                    </tr>
                                </thead>
                                <tbody id="payment-table">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none" id="payment-data2">
                            <table class="table table-primary">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>Exam Name</th>
                                        <th>Amount</th>
                                        <th>Date of Payment</th>
                                    </tr>
                                </thead>
                                <tbody id="payment-table2">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none" id="payment-data3">
                            <table class="table table-primary">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>Payment of Year</th>
                                        <th>Amount</th>
                                        <th>Date of Payment</th>
                                    </tr>
                                </thead>
                                <tbody id="payment-table3">
                                    
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

        let year_id = $('#year_id').val();
        let class_id = $('#class_id').val();
        let id_no = $('#id_no').val();
        let fee_category_id = $('#fee_category_id').val();
        let year = $('#year').val();
        
        $.ajax({
            url: "{{ route('student.payment.data') }}",
            type: "GET",
            data:{
                'year_id': year_id,
                'class_id':class_id,
                'id_no':id_no,
                'fee_category_id': fee_category_id,
                'year':year,
            },
            success:function(response){
                if(response.student == null){
                    $('#alert').removeClass('d-none');
                }
                else if(response.student != null){
                    $('#alert').addClass('d-none');
                }
                let html = '';
                let table = '';
                let table2 = '';
                let table3 = '';

                $('#student-data').removeClass('d-none');
                html += '<h3>Student Information</h3>'+
                        '<input type="hidden" name="student_id" value="' + response.student_id + '"/>' +
                        '<br>'+
                        '<span><strong>Student Name :</strong> '+response.student.student.name+'</span>'+
                        '<br>'+
                        '<span><strong>Student Id :</strong> '+response.student.student.id_no+'</span>'+
                        '<br>'+
                        '<span><strong>Father Name :</strong> '+response.student.student.fname+'</span>'+
                        '<br>'+
                        '<span><strong>Class :</strong> '+response.student.student_class.name+'</span>'+
                        '<br>'+
                        '<span><strong>Year :</strong> '+response.student.student_year.year+'</span>'+
                        // '<br>'+
                        // '<span><strong>Group :</strong> '+response.student.group.group_name+'</span>'+
                        '<br>'+
                        '<span><strong>Roll :</strong> '+response.student.assigned_student.roll+'</span>'+
                        '<br>'+
                        '<br>'+
                        '<h3>Payment Information</h3>'+
                        '<br>'+
                        '<span><strong>Fee Type :</strong> '+response.student.fee_category.name+'</span>'
                        // '<br>'+
                        // '<span><strong>Amount :</strong> '+response.student.amount+'</span>'
                        // '<br>'+
                        // '<span><strong>Payment Date :</strong> '+response.student.payment_date+'</span>'
                html = $('#student-data').html(html);

                if(fee_category_id == 2){
                    $('#payment-data').removeClass('d-none');
                    $.each(response.student_acc,function(key,value){
                    table += '<tr>'+
                                '<td>'+value.year+'</td>'+
                                '<td>'+value.month+'</td>'+
                                '<td>'+value.pamount+'</td>'+
                                '<td>'+value.pdate+'</td>'
                             '</tr>';
                    });
                    table = $('#payment-table').html(table);

                }else{
                    $('#payment-data').addClass('d-none');
                }
                
                if(fee_category_id == 4){
                    $('#payment-data2').removeClass('d-none');
                    $.each(response.exam_fee,function(key,value){
                        if(value.exam_type != null){
                            table2 += '<tr>'+
                                            '<td>'+value.exam_type.name+'</td>'+
                                            '<td>'+value.amount+'</td>'+
                                            '<td>'+value.payment_date+'</td>'
                                      '</tr>';
                        }
                    });
                    table2 = $('#payment-table2').html(table2);

                }else{
                    $('#payment-data2').addClass('d-none');
                }
                if(fee_category_id != 4 && fee_category_id != 2){
                    $('#payment-data3').removeClass('d-none');
                    $.each(response.other_fee,function(key, value){
                        table3 += '<tr>'+
                                        '<td>'+value.otherfeeyear+'</td>'+
                                        '<td>'+value.otherfeeamount+'</td>'+
                                        '<td>'+value.otherfeedate+'</td>'     
                                  '</tr>';
                    });
                    table3 = $('#payment-table3').html(table3);

                }else{
                    $('#payment-data3').addClass('d-none');
                }
            }
        });
    });
</script>
<script>
   $('.yearpicker').datepicker({
        minViewMode: 2,
        format:'yyyy'
   });
</script> 
</div>
@endsection