@section('title')
Assign Additional Subject
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Assign Additional Subject</h5> 
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="d-flex">
                            <div class="form-group col-md-3">
                                <label for="class_id">Class <span class="text-danger">*</span></label>
                                <select class="form-control" id="class_id" name="class_id">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="year_id">Year<span class="text-danger">*</span></label>
                                <select class="form-control" id="year_id" name="year_id">
                                    <option value="">Select Year</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                                @error('year_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="group_id">Group<span class="text-danger">*</span></label>
                                <select class="form-control" id="group_id" name="group_id">
                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="button" id="search" class="btn btn-success" style="margin-top: 32px">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-none" id="student-table">
                        <table class="table table-bordered" id="table">
                            <thead class="table table-success">
                                <tr>
                                    <th>Studen Name</th>
                                    <th>Student Id</th>
                                    <th>Class</th>
                                    <th>Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="student-tbody">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).on('click','#search', function(){
        let class_id = $('#class_id').val();
        let year_id = $('#year_id').val();
        let group_id = $('#group_id').val();

        $.ajax({
            url: "{{ route('get.student') }}",
            type: 'get',
            data: {
                'class_id': class_id,
                'year_id': year_id,
                'group_id':group_id,
            },
            success:function(response){
                let html = '';
                $('#student-table').removeClass('d-none');
                $.each(response, function(key, value){
                    html += 
                    '<tr>' +
                            '<td>' + value.student.name + '</td>'+
                            '<td>' + value.student.id_no + '</td>' +
                            '<td>' + value.student_class.name + '</td>' +
                            '<td>' + value.group.group_name + '</td>' +
                            '<td>' + 
                                '<button type="button" id="show" class="btn btn-primary btn-sm" value="'+value.student_id+'">View</button>'
                            + '</td>' +
                    '</tr>';
                });
                html = $('#student-tbody').html(html);

                
                $(document).on('click','#show',function(){
                    let student_id = $(this).val();
                    let route = "{{ route('additional.show',":student_id") }}";
                    route = route.replace(':student_id',student_id);
                    window.location=route;
                });
            }
        });
   });
</script>
@endsection