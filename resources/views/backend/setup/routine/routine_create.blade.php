@section('title')
Add Class Routine
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Class Routine</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('routine.store') }}" method="POST">
                    @csrf
                        <div>
                            <div class="f-w-7 font-20">DEMO SCHOOL</div>
                            <div class="row f-w-7">
                                <div class="col-md-3 form-group">
                                    <label class="" for="class">Class</label>
                                    <select class="form-control d-inline" name="class_id" id="class">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="year" for="year">Year</label>
                                    <select class="form-control" name="year_id" id="year">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                        <option value="{{$year->id}}">{{$year->year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="shift">Shift</label>
                                    <select class="form-control" name="shift_id" id="shift">
                                        <option value="">Select</option>
                                        @foreach($shifts as $shift)
                                        <option value="{{$shift->id}}">{{$shift->shift_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="section">Section</label>
                                    <select class="form-control" name="section_id" id="section">
                                        <option value="">Select</option>
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->section_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="class_teacher" class="col-sm-2 col-form-label">Class Teacher</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="class_teacher_id" id="class_teacher">
                                        <option value="">Select</option>
                                        @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="routineadd" class="table table-hover table-dark table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10%">Day</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                        <td><input type="text" name="class_time[]" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="weekday[]" id="">
                                                <option value="">Select</option>
                                                @foreach($weekdays as $key => $day)
                                                <option value="{{ $key }}">{{ $day }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td id="add_item">
                                            <div class="form-group">
                                                Subject
                                                <select class="form-control" name="subject[]" id="">
                                                <option value="">Select</option>
                                                @foreach(@$subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                                </select>
                                                Teacher
                                                <select class="form-control" name="class_teacher[]" id="class_teacher">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
@endsection
