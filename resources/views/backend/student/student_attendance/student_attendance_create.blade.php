@section('title')
Add Attendance
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Select2 css -->
<!-- <link href="{{ asset('backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" /> -->
<!-- Tagsinput css -->
<!-- <link href="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" /> -->

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Attendance</h5>
                </div>
                <div class="card-body">
                <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="year_id">Year</label>
                            <select id="year_id" name="year_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="class_id">Class</label>
                            <select id="class_id" name="class_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="shift_id">Shift</label>
                            <select id="shift_id" name="shift_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}">{{ $shift->shift_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="section_id">Section</label>
                            <select id="section_id" name="section_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
                        </div>
                    </div>

                    

                    <!--  -->
                    <form action="{{ route('student.attendance.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date"><strong>Attendance Date</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="date" name="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" id="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div id="DocumentResults">
                                <script id="document-template" type="text/x-handlebars-template">
                                    <table class="table table-hover table-dark table-bordered">
                                        <thead>
                                            <tr>
                                                @{{{thsource}}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @{{#each this}}
                                            <tr>
                                            @{{{tdsource}}}
                                            </tr>
                                            @{{/each}}
                                        </tbody>
                                    </table>
                                </script>
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

<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var shift_id = $('#shift_id').val();
        var section_id = $('#section_id').val();

        $.ajax({
            url: "{{ route('student.attendance.getstudents') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'shift_id': shift_id,
                'section_id': section_id,
            },
            beforeSend: function() {},
            success: function(data) {
                var script = $("#document-template");
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('#DocumentResults').after($("#document-template").html());
                $('#DocumentResults').append(script);
                // $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<!-- Select2 js -->
<!-- <script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script> -->
<!-- Tagsinput js -->
<!-- <script src="{{ asset('backend/assets/js/custom/custom-form-select.js') }}"></script> -->
@endsection
