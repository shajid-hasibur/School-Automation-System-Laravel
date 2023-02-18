@section('title')
Add Leave
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Select2 css -->
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
                    <h5 class="card-title">Add Leave</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee.leave.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employee_id"><strong>Employee Name</strong> <span class="text-danger">*</span></label>
                                <select name="employee_id" class="select2-single form-control" id="employee_id" required>
                                    <option value="" disabled>Select</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="leave_purpose"><strong>Leave Purpose</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="leave_purpose_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="leave_from"><strong>Leave From</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="leave_from" class="form-control" id="leave_from" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="leave_to"><strong>Leave To</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="leave_to" class="form-control" id="leave_to" required>
                            </div>
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
<!-- Select2 js -->
<script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script>
<!-- Tagsinput js -->
<script src="{{ asset('backend/assets/js/custom/custom-form-select.js') }}"></script>

<script>
$(document).ready(function() {
    $(document).on('change', '#leave_purpose_id', function() {
        var leave_purpose_id = $(this).val();
        if (leave_purpose_id == 0) {
            $('#add_other').show();
        } else {
            $('#add_other').hide();
        }
    });
});
</script>
@endsection
