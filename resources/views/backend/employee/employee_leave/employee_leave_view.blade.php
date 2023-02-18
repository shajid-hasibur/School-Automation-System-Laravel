@section('title')
Employee Leave
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
                    <h5 class="card-title">Employee Leave</h5>
                    <a href="{{ route('employee.leave.create') }}" class="btn btn-primary" style="float: right;">Add Leave</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Name</th>
                                    <th>ID No</th>
                                    <th>Leave Purpose</th>
                                    <th>Leave From</th>
                                    <th>Leave To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($employee_data as $key => $leave)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $leave['user']['name'] }}</td>
                                    <td>{{ $leave['user']['id_no'] }}</td>
                                    <td>{{ $leave['purpose']['name']}}</td>
                                    <td>{{ $leave->leave_from }}</td>
                                    <td>{{ $leave->leave_to }}</td>
                                    <td style="white-space: nowrap; width: 15%;">
                                        <a href="{{ route('employee.leave.delete', $leave->id) }}" class="tabledit-delete-button btn btn-sm btn-danger" style="margin: 5px; float: none;" id="delete"><span class="ti-trash"></span></a>
                                    </td>
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
<script src="{{ asset('backend/assets/plugins/tabledit/jquery.tabledit.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/custom-table-editable.js') }}"></script>
@endsection
