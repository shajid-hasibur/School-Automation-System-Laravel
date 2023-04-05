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
                                    <label for="id_no">Student Id</label>
                                    <input type="text" name="id_no" id="id_no" class="form-control">
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

        $.ajax({
            url: "{{ route('student.payment.search') }}",
            type: "GET",
            data:{
                'year_id': year_id,
                'class_id':class_id,
                'id_no':id_no,
            },
            success:function(response){
                let html = '';
                $('#student-data').removeClass('d-none');
                html += '<h3>Student Information</h3>'+
                        '<br>'+
                        '<span><strong>Student Name :</strong> '+response.student.name+'</span>'+
                        '<br>'+
                        '<span><strong>Student Id :</strong> '+response.student.id_no+'</span>'+
                        '<br>'+
                        '<span><strong>Student Roll :</strong> '+response.roll+'</span>'+
                        '<br>'+
                        '<span><strong>Father Name :</strong> '+response.student.fname+'</span>'+
                        '<br>'+
                        '<span><strong>Class :</strong> '+response.student_class.name+'</span>'+
                        '<br>'+
                        '<span><strong>Year :</strong> '+response.student_year.year+'</span>'+
                        '<br>'+
                        '<span><strong>Group :</strong> '+response.group.group_name+'</span>'+
                        '<br>'+
                        '<br>'+
                        '<button class="btn btn-warning">Take Payment</button>'
                html = $('#student-data').html(html);
            }
            
        });
    });
</script>    
</div>
@endsection