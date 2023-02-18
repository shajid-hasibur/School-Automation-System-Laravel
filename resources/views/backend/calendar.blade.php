@section('title')
Timetable
@endsection
@extends('backend.layouts.master')
@section('style')
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    Calendar
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-dark table-bordered">
                            <thead>
                                <th width="125">Time</th>
                                @foreach($weekDays as $day)
                                <th>{{ $day }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @foreach($calendarData as $time => $days)
                                <tr>
                                    <td>
                                        {{ $time }}
                                    </td>
                                    @foreach($days as $value)
                                    @if (is_array($value))
                                    <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0">
                                        Subject: {{ $value['subject_name'] }}<br>
                                        {{ $value['class_name'] }}<br>
                                        Teacher: {{ $value['teacher_name'] }}
                                    </td>
                                    @elseif ($value === 1)
                                    <td></td>
                                    @endif
                                    @endforeach
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
