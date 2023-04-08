@section('title')
Student Fee
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
                <div>
                    <div class="card-header">
                        <h5 class="card-title">Student Search</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.payment.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="year_id">Year</label>
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
                                    <button type="button" id="search" class="btn btn-success" style="margin-top: 31px;">Search</button>
                                    </div>
                            </div>
                            <div class="d-none" id="student-data">
                                
                            </div>
                            <br><div class="d-none" id="payment-data">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="feeId"><strong>Fee Type</strong></label>
                                        <select id="feeId" name="fee_category_id" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Month</strong></label>
                                        <input type="month" name="date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Payment Date</strong></label>
                                        <input type="date" name="payment_date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="examfee">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="examfeeId"><strong>Fee Type</strong></label>
                                        <select id="examfeeId" name="fee_category_id" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="examfeeId"><strong>Select Exam</strong></label>
                                        <select id="exam_type_id" name="exam_type_id" class="form-control">
                                            <option value="">Select Exam</option>
                                            @foreach ($exams as $exam)
                                                <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Payment Date</strong></label>
                                        <input type="date" name="payment_date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="otherfee">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="otherfeeId"><strong>Fee Type</strong></label>
                                        <select id="otherfeeId" name="fee_category_id" class="form-control">
                                           
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Payment Date</strong></label>
                                        <input type="date" name="payment_date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                                    </div>
                                </div>
                            </div>
                        </form>    
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
        $.ajax({
            url: "{{ route('student.payment.search') }}",
            type: "GET",
            data:{
                'year_id': year_id,
                'class_id':class_id,
                'id_no':id_no,
                'fee_category_id': fee_category_id,
            },
            success:function(response){
                let html = '';
                $('#student-data').removeClass('d-none');
                html += '<h3>Student Information</h3>'+
                        '<input type="hidden" name="student_id" value="' + response.student.student_id + '"/>' +
                        '<br>'+
                        '<span><strong>Student Name :</strong> '+response.student.student.name+'</span>'+
                        '<br>'+
                        '<span><strong>Student Id :</strong> '+response.student.student.id_no+'</span>'+
                        '<br>'+
                        '<span><strong>Student Roll :</strong> '+response.student.roll+'</span>'+
                        '<br>'+
                        '<span><strong>Father Name :</strong> '+response.student.student.fname+'</span>'+
                        '<br>'+
                        '<span><strong>Class :</strong> '+response.student.student_class.name+'</span>'+
                        '<br>'+
                        '<span><strong>Year :</strong> '+response.student.student_year.year+'</span>'+
                        '<br>'+
                        '<span><strong>Group :</strong> '+response.student.group.group_name+'</span>'+
                        '<br>'+
                        '<span><strong>Fee Type :</strong> '+response.feeAmount.fee_category.name+'</span>'+
                        '<br>'+
                        '<span><strong>Amount :</strong> '+response.feeAmount.amount+'</span>'+
                        '<br>'+
                        '<span><strong>Discount :</strong> '+response.student.discount.discount+'%</span>'+
                        '<br>'+
                        '<span><strong>Discount Amount :</strong> '+response.discount_amount+'</span>'+
                        '<br>'+
                        '<span><strong>Amount For This Student :</strong> '+response.final_amount+'</span>'+
                        '<br>'+
                        '<br>'+
                        '<button type="button" class="btn btn-warning" id="payment-button">Take Payment</button>'
                html = $('#student-data').html(html);
            }
            
        });
    });
</script>
<script>
    $(document).on('click','#payment-button',function(){
        let fee_category_id = $('#fee_category_id').val();
        $.ajax({
            url: "{{ route('student.fee.search') }}",
            type: "GET",
            data:{
                'fee_category_id': fee_category_id
            },
            success:function(response){
                if(response.id == fee_category_id && response.id == 2)
                {
                    $('#payment-data').removeClass('d-none');
                    let html = '';
                    html += '<option value="'+response.id+'">'+response.name+'</option>';
                    html = $('#feeId').html(html);
                }
                else if(response.id == fee_category_id && response.id == 4)
                {
                    $('#examfee').removeClass('d-none');
                    let html1 = '';
                    html1 += '<option value="'+response.id+'">'+response.name+'</option>';
                    html1 = $('#examfeeId').html(html1);
                }
                else
                {
                    $('#otherfee').removeClass('d-none');
                    let html2 = '';
                    html2 += '<option value="'+response.id+'">'+response.name+'</option>';
                    html2 = $('#otherfeeId').html(html2);
                }
            }
        });
    });
</script>    
</div>
@endsection