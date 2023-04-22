@section('title')
Student Marks Entry
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Search</h5>
                </div>
                <div class="card-body">
                    <div class="d-none" id="group-warning">
                        <div class="alert alert-danger">
                            Please select a group and search again for class 9 and 10 to get the students groupwise.
                        </div>
                    </div>
                    <form method="post" action="{{ route('marks.entry.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="section_id">Section</label>
                                <select id="section_id" name="section_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="assign_subject_id">Subject</label>
                                <select id="assign_subject_id" name="assign_subject_id" class="form-control">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exam_type_id">Exam</label>
                                <select id="exam_type_id" name="exam_type_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($exam_types as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="group_id">Group</label>
                                <select id="group_id" name="group_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="button" onclick="validation()" name="search" id="search" class="btn btn-secondary" >Search</button>
                            </div>
                        </div>

                        <br>
                        <div class="d-none" id="marks-entry">
                            <div>
                                @if($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                                <div id="errorMsg" class="font-xl" hidden="hidden"><strong>Marks Already Added For this criteria</strong></div>
                                <table id="marksTable" class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Descriptive Mark</th>
                                            <th>Objective Mark</th>
                                            <th>Practical Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody id="marks-entry-tbody">
                                    </tbody>
                                </table>
                            </div>
                            <button id="formSubmit" type="submit" class="btn btn-primary">Submit Mark</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();
        var group_id = $('#group_id').val();

        // if(class_id == 9 && class_id == 10){
        //     $('#group_id').attr('required',true);
        // }

        $.ajax({
            url: "{{ route('marks.get.students') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'section_id': section_id,
                'assign_subject_id': assign_subject_id,
                'exam_type_id': exam_type_id,
                'group_id': group_id
            },
            success: function(data) {
                // alert(data.result);
                var studentData = '';
                if(class_id == 9 || class_id == 10){
                    studentData = data.ssc_students;
                }else if(class_id != 9 && class_id != 10){
                    studentData = data.students;
                }else{
                    studentData = '';
                }

                $('#marks-entry').removeClass('d-none');
                var html = '';
                if (data.result == 'no') {
                    $('#errorMsg').removeAttr('hidden','hidden');
                    $('#marksTable').attr({hidden:'hidden'});
                    $('#formSubmit').attr('hidden','hidden');

                } else {
                    $('#errorMsg').attr('hidden','hidden');
                    $('#marksTable').removeAttr('hidden','hidden');
                    $('#formSubmit').removeAttr('hidden', 'hidden');

                    $.each(studentData, function(key, value) {
                        html +=
                            '<tr>' +
                            '<td>' + value.student.id_no +
                            '<input type="hidden" name="student_id[]" value="' + value.student_id + '"/>' +
                            '<input type="hidden" name="id_no[]" value="' + value.student.id_no + '"/>' +
                            '</td>' +
                            '<td>' + value.student.name + '</td>' +
                            '<td>' + value.student_class.name + '</td>' +
                            '<td>' + value.student.gender + '</td>' +
                            '<td>' + '<input type="number" class="form-control" name="descriptive_mark[]" required/>' + '</td>' +
                            '<td>' + '<input type="number" class="form-control" name="objective_mark[]" required/>' + '</td>' +
                            '<td>' + '<input type="number" class="form-control" name="practical_mark[]" required/>' + '</td>' +
                            '</tr>';
                    });
                }
                html = $('#marks-entry-tbody').html(html);
            }
        });
    });
</script>
<script>
    $(document).on('change', '#class_id', function() {
        var class_id = $('#class_id').val();
        $.ajax({
            url: "{{ route('marks.get.subjects') }}",
            type: 'get',
            data: {
                'class_id': class_id,
            },
            beforeSend: function() {},
            success: function(data) {
                var html = ' <option value="">Choose...</option>';
                $.each(data, function(key, value) {
                    html += '<option value="' + value.id + '">' + value.subject.name + '</option>';
                });
                $('#assign_subject_id').html(html);
            }
        });
    });
</script>
<script>
    function validation(){
        let class_id = document.getElementById("class_id").value;
        let group = document.getElementById("group_id").value;
        
        if((group == 'Choose...') && (class_id == 9 || class_id == 10)){
            $('#group-warning').removeClass('d-none');
        }else{
            $('#group-warning').addClass('d-none');
        }
    }
</script>
 <!-- <script>
    //check If marks entered
    $(document).on('change', '#exam_type_id', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();
        $.ajax({
            url: "{{ route('marks.check.existence') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'section_id': section_id,
                'assign_subject_id': assign_subject_id,
                'exam_type_id': exam_type_id,
            },
            beforeSend: function() {},
            success: function(data) {
                if (data = 1) {
                    $('#search').prop("disabled", true);
                    swal({
                        text: "Marks Already added for selected criteria",
                        type: "warning",
                        showCancelButton: true
                    });
                } else {

                }
            }
        });
    });
</script> -->

@endsection
