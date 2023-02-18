@section('title')
Employee Information
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Select2 css -->
<style>
    input{ text:black}
</style>
<link href="{{ asset('backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Tagsinput css -->

<link href="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Employee Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee.registration.update', $employeeData->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="employee_name"><strong>Employee Name</strong> 
                                <div for="">{{ $employeeData->name }}</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="father_name"><strong>Father's Name</strong> 
                                <div for="">{{ $employeeData->fname }}</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mother_name"><strong>Mother's Name</strong> 
                                <div for="">{{ $employeeData->mname }}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="mobile"><strong>Mobile</strong></label>
                                <div for="">{{ $employeeData->mobile }}</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email"><strong>Email</strong></label>
                                <div for="">{{ $employeeData->email }}</div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="mname"><strong>Gender</strong></label>
                                <div for="">{{ $employeeData->gender }}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="address"><strong>Address</strong></label>
                                <div for="">{{ $employeeData->address }}</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="religion"><strong>Religion</strong></label>
                                <div for="">{{ $employeeData->religion }}</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dob"><strong>Date of Birth</strong></label>
                                <div for="">{{ $employeeData->dob }}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="designation_id"><strong>Designation</strong> 
                                <div for="">{{ $employeeData->designation['name'] }}</div>
                            </div>
                            @if(!@$employeeData)
                            <div class="form-group col-md-4">
                                <label for="salary"><strong>Salary</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="salary" class="form-control" id="salary" value="{{ $employeeData->salary }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="join_date"><strong>Date of Joinning</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="join_date" class="form-control" id="join_date" value="{{ $employeeData->joindate }}">
                            </div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="class"><strong>Profile Picture</strong></label>
                                <img src="{{ (!empty($employeeData->image))? url('uploads/employee_images/'.$employeeData->image) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 300px;" id="showImage">
                                
                            </div>
                            <div class="form-group col-md-4">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    function preview() {
        showImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
@section('script')
<!-- Select2 js -->
<script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script>
<!-- Tagsinput js -->
<script src="{{ asset('backend/assets/js/custom/custom-form-select.js') }}"></script>
@endsection
