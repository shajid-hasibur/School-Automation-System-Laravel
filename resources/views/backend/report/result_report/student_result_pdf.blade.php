<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student result pdf</title>
    <style>
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .row-no-gutters {
            margin-right: 0;
            margin-left: 0;
        }

        .row-no-gutters [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }

        .col-xs-1,
        .col-sm-1,
        .col-md-1,
        .col-lg-1,
        .col-xs-2,
        .col-sm-2,
        .col-md-2,
        .col-lg-2,
        .col-xs-3,
        .col-sm-3,
        .col-md-3,
        .col-lg-3,
        .col-xs-4,
        .col-sm-4,
        .col-md-4,
        .col-lg-4,
        .col-xs-5,
        .col-sm-5,
        .col-md-5,
        .col-lg-5,
        .col-xs-6,
        .col-sm-6,
        .col-md-6,
        .col-lg-6,
        .col-xs-7,
        .col-sm-7,
        .col-md-7,
        .col-lg-7,
        .col-xs-8,
        .col-sm-8,
        .col-md-8,
        .col-lg-8,
        .col-xs-9,
        .col-sm-9,
        .col-md-9,
        .col-lg-9,
        .col-xs-10,
        .col-sm-10,
        .col-md-10,
        .col-lg-10,
        .col-xs-11,
        .col-sm-11,
        .col-md-11,
        .col-lg-11,
        .col-xs-12,
        .col-sm-12,
        .col-md-12,
        .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12 {
            float: left;
        }

        .col-md-12 {
            width: 100%;
        }

        .col-md-11 {
            width: 91.66666667%;
        }

        .col-md-10 {
            width: 83.33333333%;
        }

        .col-md-9 {
            width: 75%;
        }

        .col-md-8 {
            width: 66.66666667%;
        }

        .col-md-7 {
            width: 58.33333333%;
        }

        .col-md-6 {
            width: 50%;
        }

        .col-md-5 {
            width: 41.66666667%;
        }

        .col-md-4 {
            width: 33.33333333%;
        }

        .col-md-3 {
            width: 25%;
        }

        .col-md-2 {
            width: 16.66666667%;
        }

        .col-md-1 {
            width: 8.33333333%;
        }

        .col-md-pull-12 {
            right: 100%;
        }

        .col-md-pull-11 {
            right: 91.66666667%;
        }

        .col-md-pull-10 {
            right: 83.33333333%;
        }

        .col-md-pull-9 {
            right: 75%;
        }

        .col-md-pull-8 {
            right: 66.66666667%;
        }

        .col-md-pull-7 {
            right: 58.33333333%;
        }

        .col-md-pull-6 {
            right: 50%;
        }

        .col-md-pull-5 {
            right: 41.66666667%;
        }

        .col-md-pull-4 {
            right: 33.33333333%;
        }

        .col-md-pull-3 {
            right: 25%;
        }

        .col-md-pull-2 {
            right: 16.66666667%;
        }

        .col-md-pull-1 {
            right: 8.33333333%;
        }

        .col-md-pull-0 {
            right: auto;
        }

        .col-md-push-12 {
            left: 100%;
        }

        .col-md-push-11 {
            left: 91.66666667%;
        }

        .col-md-push-10 {
            left: 83.33333333%;
        }

        .col-md-push-9 {
            left: 75%;
        }

        .col-md-push-8 {
            left: 66.66666667%;
        }

        .col-md-push-7 {
            left: 58.33333333%;
        }

        .col-md-push-6 {
            left: 50%;
        }

        .col-md-push-5 {
            left: 41.66666667%;
        }

        .col-md-push-4 {
            left: 33.33333333%;
        }

        .col-md-push-3 {
            left: 25%;
        }

        .col-md-push-2 {
            left: 16.66666667%;
        }

        .col-md-push-1 {
            left: 8.33333333%;
        }

        .col-md-push-0 {
            left: auto;
        }

        .col-md-offset-12 {
            margin-left: 100%;
        }

        .col-md-offset-11 {
            margin-left: 91.66666667%;
        }

        .col-md-offset-10 {
            margin-left: 83.33333333%;
        }

        .col-md-offset-9 {
            margin-left: 75%;
        }

        .col-md-offset-8 {
            margin-left: 66.66666667%;
        }

        .col-md-offset-7 {
            margin-left: 58.33333333%;
        }

        .col-md-offset-6 {
            margin-left: 50%;
        }

        .col-md-offset-5 {
            margin-left: 41.66666667%;
        }

        .col-md-offset-4 {
            margin-left: 33.33333333%;
        }

        .col-md-offset-3 {
            margin-left: 25%;
        }

        .col-md-offset-2 {
            margin-left: 16.66666667%;
        }

        .col-md-offset-1 {
            margin-left: 8.33333333%;
        }

        .col-md-offset-0 {
            margin-left: 0%;
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .text-center {
            text-align: center !important;
        }
        /* table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        } */

        .design th, .design td{
            border: 1px solid black;
            text-align: left;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <table class="styled-table">
                <tr>
                    <th width="30%">
                        {{-- <img src="{{ asset('backend/assets/images/ums.png') }}" class="img-responsive" alt="logo" style="width:100px; height:100px;"> --}}
                    </th>
                    <td>
                        <h1>Unique Model School</h1>
                        <h3>Address : Shahzadpur, Sirajganj</h3>
                        <p>Phone: 01729619595</p>
                        <p>Email: uniquemodelschool14@gmail.com</p>
                        <p>Student Result Report</p>
                    </td>
                </tr>
            </table>
            <div>
                <strong>Result of: </strong>{{ $allData['0']['exam_type']['name'] }}
            </div>
            <div>
                <strong>Year/Session: </strong>{{ $allData['0']['year']['year'] }}
            </div>
            <div>
                <strong>Class: </strong>{{ $allData['0']['student_class']['name'] }}
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <table class="table design" id="result"  style="border-collapse: collapse;">
                    <caption><strong>Student</strong> </caption>
                    @php
                        $assign_student = App\Models\AssignStudent::where('year_id', $allMarks['0']->year_id)
                            ->where('class_id', $allMarks['0']->class_id)
                            ->where('student_id',$allMarks['0']->student_id)
                            ->first();
                    @endphp
                    <tr>
                        <td>Student ID</td>
                        <td>{{ $allMarks['0']['id_no'] }}</td>
                    </tr>
                    <tr>
                        <td>Student Name</td>
                        <td>{{ $allMarks['0']['student']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>{{ @$allMarks['0']['student_class']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Roll</td>
                        <td>{{ @$assign_student->roll }}</td>
                    </tr>
                    <tr>
                        <td>Session</td>
                        <td>{{ @$allMarks['0']['year']['year'] }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table design" id="result"  style="border-collapse: collapse;">
                    <caption><strong>Letter Grade</strong></caption>
                    <thead>
                        <tr>
                            <th>Grade</th>
                            <th>Marks Interval</th>
                            <th>Grade Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allGrades as $grade)
                            <tr>
                                <td>{{ @$grade->grade_name }}</td>
                                <td>{{ @$grade->start_marks }} - {{ $grade->end_marks }}</td>
                                <td>{{ @$grade->start_point }} - {{ $grade->end_point }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <caption><strong>Result List</strong></caption>
                <mark style="background-color: yellow"><strong>Compulsory Subject Result</strong></mark>
                <table class="table design" id="result"  style="border-collapse: collapse;">
                    
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Subject</th>
                            <th>Full Marks</th>
                            <th>Pass Marks</th>
                            <th>Obtained Marks</th>
                            <th>Grade</th>
                            <th>Grade Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_marks = 0;
                            $total_grade_point = 0;
                            $bonusPoint = 0;
                            $subject_mark = @$addSubMark->total_mark; 
                            $grade1 = App\Models\MarksGrade::where([['start_marks', '<=', (int)$subject_mark], ['end_marks', '>=', (int)$subject_mark]])->first();
                            if ($grade1->grade_point == 0) {
                                    $bonusPoint = 0;
                                }
                            elseif($grade1->grade_point >= 2){
                                    $bonusPoint = $grade1->grade_point-2;
                                }
                        @endphp
                        @foreach ($allMarks as $key => $mark)
                            @php
                                $obtained_marks = $mark->total_mark;
                                $total_marks = (float) $total_marks + (float) $obtained_marks;
                                $total_subject = App\Models\StudentMarks::where('year_id', $mark->year_id)
                                    ->where('class_id', $mark->class_id)
                                    ->where('exam_type_id', $mark->exam_type_id)
                                    ->where('student_id', $mark->student_id)
                                    ->where('add_subject_id',$mark->add_subject_id)
                                    ->get()
                                    ->count();   
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ @$mark['assign_subject']['subject']['name'] }}</td>
                                <td>{{ @$mark['assign_subject']['full_mark'] }}</td>
                                <td>{{ @$mark['assign_subject']['pass_mark'] }}</td>
                                <td>{{ @$obtained_marks }}</td>
                                @php
                                    $grade = App\Models\MarksGrade::where([['start_marks', '<=', (int) $obtained_marks], ['end_marks', '>=', (int) $obtained_marks]])->first();
                                    
                                    $grade_name = $grade->grade_name;
                                    $grade_point = $grade->grade_point;
                                    $total_grade_point = (float) $total_grade_point + (float) $grade_point;
                                @endphp
                                <td>{{ $grade_name }}</td>
                                <td>{{ $grade_point }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right;">Total Marks</td>
                            <td>{{ $total_marks }}</td>
                            <td colspan="" style="text-align: right;">Total Points</td>
                            <td>{{ $total_grade_point+$bonusPoint }}</td>
                        </tr>
                    </tfoot>
                </table>
                <mark style="background-color: yellow"><strong>Additional Subject Result</strong></mark>
                <table class="table design" style="border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Subject</th>
                            <th>Full Marks</th>
                            <th>Pass Marks</th>
                            <th>Obtained Marks</th>
                            <th>Grade</th>
                            <th>Grade Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ 1 }}</td>
                            <td>{{ @$addSubMark['assign_subject']['subject']['name'] }}</td>
                            <td>{{ @$addSubMark['assign_subject']['full_mark'] }}</td>
                            <td>{{ @$addSubMark['assign_subject']['pass_mark'] }}</td>
                            <td>{{ @$addSubMark->total_mark }}</td>
                            @php
                            if ($grade1 == null) {
                                abort(404); 
                            }
                                $grade_name1 = $grade1->grade_name;
                                $grade_point1 = $grade1->grade_point;
                            @endphp
                            @if (@$addSubMark['assign_subject']['subject']['name'] == '')
                            <td></td>
                            <td></td>
                            @else
                            <td>{{ $grade_name1 }}</td>
                            <td>{{ $grade_point1 }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <table class="table design" id="result"  style="border-collapse: collapse;">
                    <caption><strong>Result</strong></caption>
                    @php
                        $finalPoint = $total_grade_point+$bonusPoint;
                        $total_grade = 0;
                        $point_for_letter_grade = (float) $finalPoint / (float) $total_subject;
                        if($point_for_letter_grade > 5){
                            $point_for_letter_grade = 5;
                        }
                        $total_grade = App\Models\MarksGrade::where([['start_point', '<=', (int) $point_for_letter_grade], ['end_point', '>=', (int) $point_for_letter_grade]])->first();

                        $gpa = (float) $finalPoint / (float) $total_subject;
                    @endphp
                    <tr>
                        <td>Result</td>
                        <td>@if ($count_fail > 0 && $additional_fail > 0)
                             Fail 
                            @elseif ($count_fail > 0 && $additional_fail == 0)
                             Fail
                            @else
                             Pass 
                            @endif</td>
                    </tr>
                    <tr>
                        <td>GPA</td>
                        <td>@if ($count_fail > 0 && $additional_fail > 0)
                             0.00
                            @elseif ($count_fail > 0 && $additional_fail == 0)
                             0.00 
                            @elseif ($gpa >=5)
                             5.00
                            @else{{ number_format($gpa,2) }} 
                            @endif</td>
                    </tr>
                    <tr>
                        <td>Letter Grade</td>
                        <td>
                            @if ($count_fail > 0)
                                F
                            @else
                                {{ $total_grade->grade_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Total Marks</td>
                        <td>{{ $total_marks }}</td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td>
                            @if ($count_fail > 0)
                                ''
                            @else
                                {{ $total_grade->remarks }}
                            @endif
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-3 ">
                <hr style="border: solid 1px; margin-bottom: -2px">
                <div class="text-center">Teacher</div>
            </div>
            <div class="col-md-3">
                <hr style="border: solid 1px; margin-bottom: -2px">
                <div class="text-center">Parents</div>
            </div>
            <div class="col-md-3">
                <hr style="border: solid 1px; margin-bottom: -2px">
                <div class="text-center">Principal</div>
            </div>
        </div>
        <p style="font-size: 10px;" class="text-end"><i>Print date: {{ date('d M Y') }}</i></p>
    </div>
</body>

</html>
