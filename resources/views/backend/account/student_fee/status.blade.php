@section('title')
Student Payment Status
@endsection
@extends('backend.layouts.master')
@section('style')
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Payment Status</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('get.payment.data') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="fee_category_id">Fee Type</label>
                                <select id="fee_category_id" name="fee_category_id" class="form-control">
                                    <option selected="" value="">Choose...</option>
                                    @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red; font-size:14px">
                                    @error('fee_category_id')
                                      {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="" value="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red; font-size:14px">
                                    @error('class_id')
                                      {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class_id">Exam Type</label>
                                <select id="exam_type_id" name="exam_type_id" class="form-control">
                                    <option selected="" value="">Choose...</option>
                                    @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red; font-size:14px">
                                    @error('exam_type_id')
                                      {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-success" style="margin-top: 31px">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection