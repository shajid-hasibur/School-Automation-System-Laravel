@section('title')
Edit Subject
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
                    <h5 class="card-title">Edit Subject</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <form class="form-validate" action="{{ route('subject.update', $subject->id) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            {{-- <label class="col-lg-3 col-form-label" for="name">Subject Name <span class="text-danger">*</span></label> --}}
                            <div class="col-lg-6">
                                <label for="name">Subject Name :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Subject Name" value="{{ $subject->name }}">

                            </div>
                            <div class="form-group col-md-6" style="margin-top: 38px;">
                                <input type="checkbox" class="form-check-input" name="flag" value="1"{{ ($subject->flag == 1?'checked':'') }}>
                                <label  for="flag">Mark as additional subject</label>
                            </div>
                            @error('name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            {{-- <label class="col-lg-3 col-form-label"></label> --}}
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">Update</button>
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
@endsection