@section('title')
Lesson
@endsection
@extends('backend.layouts.master')
@section('style')
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
                    <a class="btn btn-primary" style="float: right;" href="{{ route('lessons.index') }}">
                        Back
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    Fields id
                                </th>
                                <td>
                                    {{ $lesson->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Class
                                <td>
                                    {{ $lesson->class->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Teacher
                                </th>
                                <td>
                                    {{ $lesson->teacher->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Weekday
                                </th>
                                <td>
                                    {{ $lesson->weekday }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Start Time
                                </th>
                                <td>
                                    {{ $lesson->start_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    End Time
                                </th>
                                <td>
                                    {{ $lesson->end_time }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('lessons.index') }}">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
