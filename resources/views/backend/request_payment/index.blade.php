@section('title')
Assign Student Fee
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
                    <h5 class="card-title"></h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('request.payment.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="" value="">Select a class</option>
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
                            <div class="form-group col-md-4">
                                <label for="fee_category_id">Fee Type</label>
                                <select id="fee_category_id" name="fee_category_id" class="form-control">
                                    <option selected="" value="">Select a fee type</option>
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
                            <div class="form-group col-md-4">
                                <label for="exam_type_id">Exam Type</label>
                                <select id="exam_type_id" name="exam_type_id" class="form-control">
                                    <option selected="" value="">Select a Exam type</option>
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
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Assign Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection