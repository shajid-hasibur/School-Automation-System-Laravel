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
                // alert(response.student_acc.month);
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
                        '<br>'+
                        '<h3>Payment Information</h3>'
                html = $('#student-data').html(html);
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