@section('title')
Assign Additional Subject
@endsection
@extends('backend.layouts.master')
@section('rightbar-content')
<div class="contentbar">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header d-flex">
                    <h4 class="card-title">Student Details</h4>
                </div>
                <div class="card-body d-flex">
                    <div class="col-md-6">
                        <span>Student Name: {{ $student_data['student']['name'] }}</span><br>
                        <span>Father Name: {{ $student_data['student']['fname'] }}</span><br>
                        <span>Student Class: {{ $student_data['student_class']['name'] }}</span><br>
                        <span>Student Year: {{ $student_data['student_year']['year'] }}</span><br>
                        <span>Student Id: {{ $student_data['student']['id_no'] }}</span><br>
                        <span>Student Roll: {{ $student_data->roll }}</span><br>
                        <span>Group: <mark style="background-color: yellow">{{ $student_data['group']['group_name'] }}</mark></span><br>
                        <span>Shift: {{ $student_data['student_shift']['shift_name'] }}</span><br>
                        <span>Section: {{ $student_data['student_section']['section_name'] }}</span><br>
                        <strong><span>Additional Subject: <mark style="background-color: yellow">{{ @$student_data['subject']['name'] }}</mark></span></strong><br>
                    </div>
                    <div class="col-md-6">
                       <form action="{{ route('additional.store') }}" method="POST">
                        @csrf
                            <input type="hidden" name="student_id" value="{{ $student_data->student_id}}">
                            <label>Subjects :</label>
                            <select class="form-control" name="add_subject_id">
                                <option value="">Select Additional Subject</option>
                                @foreach ($additional_subjects as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('add_subject_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div style="float: right; margin-top: 20px;">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection