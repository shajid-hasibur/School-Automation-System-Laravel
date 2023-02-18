@section('title')
Student Fee
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Fee</h5>
                    <a href="{{ route('student.fee.create') }}" class="btn btn-primary" style="float: right;">Add Student Fee</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Custom Search</h6>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="year_id">Year</label>
                            <select id="year_id" name="year_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
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
                            <label for="section_id">Section</label>
                            <select id="section_id" name="section_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fee_category_id">Fee Category</label>
                            <select id="fee_category_id" name="fee_category_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($fee_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date"><strong>Date</strong> </label>
                            <input type="month" name="date" id="date" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <a id="search" name="search" class="btn btn-secondary" style="margin-top: 32px; margin-left:33px;">Search</a>
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">
                                <form method="post" action="{{ route('account.fee.store') }}">
                                    @csrf
                                    <table class="table table-bordered table-dark">
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </script>
                        </div>
                    </div>

                    <div id="mTable" class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">ID No</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Year</th>
                                    <th width="10%">Class</th>
                                    <th width="10%">Fee Type</th>
                                    <th width="10%">Amount</th>
                                    <th width="10%">Date</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($allData as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student_year']['year'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>{{ $value['fee_category']['name'] }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>{{ date('M-Y', strtotime($value->date)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();
        $('#mTable').hide();

        $.ajax({
            url: "{{ route('account.fee.getstudentsview') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'section_id': section_id,
                'fee_category_id': fee_category_id,
                'date': date,
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
<!-- Datatable js -->
<script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/custom-table-datatable.js') }}"></script>
<!-- Tabledit js -->

@endsection
