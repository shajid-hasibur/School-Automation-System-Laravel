@section('title')
Student Registration Fee List
@endsection
@extends('backend.layouts.master')


@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Search</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('student.year.class.wise') }}">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">

                            <table class="table table-bordered table-striped">
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
                </div>

            </div>

        </div>
    </div>
 

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();

        $.ajax({
            url: "{{ route('registration.fee.classwise') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id
            },
            beforeSend: function() {},
            success: function(data) {
                var script = $("#document-template");
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('#DocumentResults').append(script);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
    
@endsection
