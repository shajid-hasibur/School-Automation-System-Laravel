@section('title')
Edit Section
@endsection
@extends('backend.layouts.master')
@section('style')

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Edit Section</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <form class="form-validate" action="{{ route('student.section.update', $studentSection->id) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="section_name">Section <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="section_name" name="section_name" placeholder="Enter Section Name" value="{{ $studentSection->section_name }}">
                            </div>
                            @error('year')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"></label>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Parsley js -->
<!-- <script src="{{ asset('assets/plugins/validatejs/validate.min.js') }}"></script> -->
<!-- Validate js -->
<!-- <script src="{{ asset('assets/js/custom/custom-validate.js') }}"></script> -->
<!-- <script src="{{ asset('assets/js/custom/custom-form-validation.js') }}"></script> -->
@endsection