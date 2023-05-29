@section('title')
Student Payment Status
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Payment Search</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('get.payment.data') }}" method="GET">
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
                    
                    <div class="table-responsive" style="margin-top: 60px">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Student Id</th>
                                    <th class="text-center">Fee Type</th>
                                    @if (@$invoices['1']['fee_category_id'] == '4')
                                    <th class="text-center">Exam Type</th>
                                    @endif
                                    <th class="text-center">Invoice No</th>
                                    <th class="text-center">Payment of</th>
                                    <th class="text-center">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $key => $invoice)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $invoice['assign_student']['student_class']['name'] }}</td>
                                        <td class="text-center">{{ $invoice['assign_student']['student']['name'] }}</td>
                                        <td class="text-center">{{ $invoice['assign_student']['student']['id_no'] }}</td>
                                        <td class="text-center">{{ $invoice['fee_category']['name'] }}</td>
                                        @if ($invoice['fee_category_id'] == '4')
                                        <td>{{ $invoice['exam_name']['name'] }}</td>
                                        @endif
                                        <td class="text-center">{{ $invoice['id'] }}</td>
                                        <td class="text-center">{{ $invoice['payment_for_date'] }}</td>
                                        @if ($invoice['status'] == 'Paid')
                                        <td class="text-center"><span class="badge badge-pill badge-success">{{ $invoice['status'] }}</span></td>
                                        @else
                                        <td class="text-center"><span class="badge badge-pill badge-danger">{{ $invoice['status'] }}</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
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
@endsection