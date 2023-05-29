@section('title')
Recent Payment 
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
                    <h5 class="card-title"></h5>
                </div>
                <div class="card-body">
                    <div class="col-md-12" style="text-align: center">
                        <h5><mark style="background-color: black;color:white">{{ $heading }}</mark></h5>
                    </div>
                    <div class="table-responsive" style="margin-top: 60px">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead style="background-color: black;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Student Id</th>
                                    <th>Class Name</th>
                                    <th>Fee type</th>
                                    <th>Payment of(Y-M-D)</th>
                                    <th>Amount</th>
                                    <th>Date of Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($PaidInvoice as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item['assign_student']['student']['name'] }}</td>
                                        <td>{{ $item['assign_student']['student']['id_no'] }}</td>
                                        <td>{{ $item['assign_student']['student_class']['name'] }}</td>
                                        <td>{{ $item['invoice']['fee_category']['name'] }}</td>
                                        <td>{{ $item['invoice']['payment_for_date'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['payment_date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <span>
                          <mark style="background-color: black;color:white">{{ $total_amount_collected."/-"." BDT Collected From ".$total_payments." Payments" }}</mark>
                        </span>
                    </div><br>
                    <div class="col-md-12">
                        <a href="{{ route('recent.payment.view') }}" class="btn btn-success">Todays Records</a>
                        <a href="{{ route('current.month.payment') }}" class="btn btn-primary">Current Month Records</a>
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