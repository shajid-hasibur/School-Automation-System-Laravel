@section('title')
Lesson List
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
                    <h5>Lesson</h5>
                    <a class="btn btn-primary" style="float: right;" href="{{ route('lessons.create') }}">
                        Create Lesson
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Lesson">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        Fields id
                                    </th>
                                    <th>
                                        Class
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Teacher
                                    </th>
                                    <th>
                                        Weekday
                                    </th>
                                    <th>
                                        start_time
                                    </th>
                                    <th>
                                        end_time
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$lessons as $key => $lesson)
                                <tr data-entry-id="{{ $lesson->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $lesson->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->class->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->subject->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->teacher->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->weekday ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->start_time ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->end_time ?? '' }}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('lessons.show', $lesson->id) }}">
                                            View
                                        </a>

                                        <a class="btn btn-xs btn-info" href="{{ route('lessons.edit', $lesson->id) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="{{ route('lessons.delete', $lesson->id) }}">
                                            Delete
                                        </a>
                                    </td>
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
@section('scripts')
@parent
@endsection
