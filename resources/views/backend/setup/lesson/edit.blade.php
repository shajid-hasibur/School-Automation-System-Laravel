@section('title')
Lesson
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Select2 css -->
<link href="{{ asset('backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Tagsinput css -->
<link href="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                <h5>Lesson Edit</h5>
                    <a class="btn btn-primary" style="float: right;" href="{{ route('lessons.index') }}">
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lessons.update', [$lesson->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="class_id">Class</label>
                            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="class_id" id="class_id" required>
                                @foreach($classes as $id => $class)
                                <option value="{{ $id }}" {{ ($lesson->class ? $lesson->class->id : old('class_id')) == $id ? 'selected' : '' }}>{{ $class }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class'))
                            <div class="invalid-feedback">
                                {{ $errors->first('class') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="subject_id">Subject</label>
                            <select class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id" required>
                                @foreach($subjects as $id => $subject)
                                <option value="{{ $id }}" {{ ($lesson->subject ? $lesson->subject->id : old('subject_id')) == $id ? 'selected' : '' }}>{{ $subject }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class'))
                            <div class="invalid-feedback">
                                {{ $errors->first('class') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">Teacher</label>
                            <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id" required>
                                @foreach($teachers as $id => $teacher)
                                <option value="{{ $id }}" {{ ($lesson->teacher ? $lesson->teacher->id : old('teacher_id')) == $id ? 'selected' : '' }}>{{ $teacher }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('teacher'))
                            <div class="invalid-feedback">
                                {{ $errors->first('teacher') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="weekday">Weekday</label>
                            <input class="form-control {{ $errors->has('weekday') ? 'is-invalid' : '' }}" type="number" name="weekday" id="weekday" value="{{ old('weekday', $lesson->weekday) }}" step="1" required>
                            @if($errors->has('weekday'))
                            <div class="invalid-feedback">
                                {{ $errors->first('weekday') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="start_time">Start Time</label>
                            <input class="form-control lesson-timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time', $lesson->start_time) }}" required>
                            @if($errors->has('start_time'))
                            <div class="invalid-feedback">
                                {{ $errors->first('start_time') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="end_time">End Time</label>
                            <input class="form-control lesson-timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time', $lesson->end_time) }}" required>
                            @if($errors->has('end_time'))
                            <div class="invalid-feedback">
                                {{ $errors->first('end_time') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Select2 js -->
<script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script>
<!-- Tagsinput js -->
<script src="{{ asset('backend/assets/js/custom/custom-form-select.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
@endsection
