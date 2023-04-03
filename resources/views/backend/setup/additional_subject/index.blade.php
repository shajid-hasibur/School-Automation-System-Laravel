@section('title')
Assign Additional Subject
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('rightbar-content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="contentbar">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header d-flex">
                    <h5 class="card-title">Additional Subject Students</h5>
                    <div style="margin-left:540px;" class="d-flex">
                        <p style="margin-top:5px;">Assign additional subject :&nbsp;</p>
                        <a href="{{ route('additional.create') }}" class="btn btn-success">Assign</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" method="GET">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="group_id">Group</label>
                                <select id="group_id" name="group_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <button type="button" id="search" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-none" id="student-table">
                        <div class="col-md-12">
                            <table class="table table-primary table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Id</th>
                                        <th>Class</th>
                                        <th>Group</th>
                                        <th>Additional Subject</th>
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
</div>
<script>
    $(document).on('click','#search',function(){
        let year_id = $('#year_id').val();
        let class_id = $('#class_id').val();
        let group_id = $('#group_id').val();

        $.ajax({
            url: "{{ route('student.list') }}",
            type: "GET",
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
                            '<td>' + value.subject.name + '</td>' +
                    '</tr>';
                });
                html = $('#student-tbody').html(html);
                // document.location.hash = "last search"
            }

        });
    });
</script>
@endsection