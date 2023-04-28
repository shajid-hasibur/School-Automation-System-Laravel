@section('title')
Student Marksheet
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <h5 class="card-title">Student Search</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('backend/assets/images/ums.png') }}" class="img-responsive" alt="logo" style="width:140px; height:140px;">
                        </div>
                        <div class="col-md-6">
                            <h4>Unique Model School</h4>
                            <p>
                                <strong>Address: Shajadpur, Sirajganj</strong>
                                <br>
                                <strong>Phone:01342654321</strong>
                                <br>
                                <strong>Email:uniquemodelschool@gmail.com</strong>
                                <br>
                                <strong>Academic Transcript</strong>
                                <br>
                                <strong>{{ $allMarks['0']['exam_type']['name'] }}</strong>
                                <br>
                            </p>
                            <h5></h5>
                        </div>
                    </div>
                    <hr>
                    <p style="text-align: right;"><i>Print Date: </i>{{ date('d M Y') }}</p>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                @php
                                $assign_student = App\Models\AssignStudent::where('year_id', $allMarks['0']->year_id)->where('class_id', $allMarks['0']->class_id)->where('student_id', $allMarks['0']->student_id)->first();
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
                                    <td>{{ $allMarks['0']['student_class']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Roll</td>
                                    <td>{{ $assign_student->roll }}</td>
                                </tr>
                                <tr>
                                    <td>Session</td>
                                    <td>{{ $allMarks['0']['year']['year'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table">
                                <thead>
                                    <th>Letter Grade</th>
                                    <th>Marks Interval</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @foreach ($allGrades as $grade)
                                    <tr>
                                        <td>{{ $grade->grade_name }}</td>
                                        <td>{{ $grade->start_marks }} - {{ $grade->end_marks }}</td>
                                        <td>{{ $grade->start_point }} - {{ $grade->end_point }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <mark style="background-color: yellow"><strong>Compulsory Subject Details</strong></mark>
                            <table class="table">
                                <thead>
                                    <th>Sl</th>
                                    <th>Subject</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
                                    <th>Obtained Marks</th>
                                    <th>Grade</th>
                                    <th>Grade Point</th>
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
                                    // dd($bonusPoint);
                                    @endphp
                                    @foreach ($allMarks as $key => $mark)
                                    @php
                                        $obtained_marks = $mark->total_mark;
                                        $total_marks = (float)$total_marks + (float)$obtained_marks;
                                        $total_subject = App\Models\StudentMarks::where('year_id', $mark->year_id)->where('class_id', $mark->class_id)->where('exam_type_id', $mark->exam_type_id)->where('add_subject_id',$mark->add_subject_id)->where('student_id', $mark->student_id)->get()->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ @$mark['assign_subject']['subject']['name']}}</td>
                                        <td>{{ @$mark['assign_subject']['full_mark'] }}</td>
                                        <td>{{ @$mark['assign_subject']['pass_mark'] }}</td>
                                        <td>{{ @$obtained_marks }}</td>
                                    @php
                                        $grade = App\Models\MarksGrade::where([['start_marks', '<=', (int)$obtained_marks], ['end_marks', '>=', (int)$obtained_marks]])->first();
                                        
                                        if ($grade == null) {
                                            abort(404); 
                                        }
                                            $grade_name = $grade->grade_name;
                                            $grade_point = $grade->grade_point;
                                            
                                            $total_grade_point = (float)$total_grade_point + (float)$grade_point;
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
                                        <td colspan="" style="text-align: right;">Total Grade Point</td>
                                        <td>{{ $total_grade_point+$bonusPoint }}</td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="3" style="text-align: right;">Total Grade Point</td>
                                        <td></td>
                                        <td colspan="3"></td>
                                    </tr> -->
                                </tfoot>
                            </table>
                            <mark style="background-color: yellow"><strong>Additional Subject Details</strong></mark>
                            <table class="table">
                                <thead>
                                    <th>Sl</th>
                                    <th>Subject</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
                                    <th>Obtained Marks</th>
                                    <th>Grade</th>
                                    <th>Grade Point</th>
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
                                        @if ($grade_name1 == 'F' && $grade_point1 == '0.00')
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
                        <div class="col-md-10">
                            <table class="table">
                                @php
                                    $finalPoint = $total_grade_point+$bonusPoint;
                                    $total_grade = 0;
                                    $point_for_letter_grade = (float)$finalPoint/(float)$total_subject;
                                    // dd($finalPoint);
                                    if($point_for_letter_grade > 5){
                                        $point_for_letter_grade = 5;
                                    }
                                    $total_grade = App\Models\MarksGrade::where([['start_point', '<=', (int)$point_for_letter_grade], ['end_point', '>=', (int)$point_for_letter_grade]])->first();
                                    // $allPoint = $total_grade_point+$bonusPoint;
                                    
                                    $gpa = (float)$finalPoint/(float)$total_subject;
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
                                    <td>@if ($count_fail > 0) F @else {{ $total_grade->grade_name }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Total Marks</td>
                                    <td>{{ $total_marks }}</td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td>@if ($count_fail > 0) '' @else {{$total_grade->remarks}} @endif</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <hr style="border: solid 1px; margin-bottom: -2px">
                            <div class="text-center">Teacher</div>
                        </div>
                        <div class="col-md-4">
                            <hr style="border: solid 1px; margin-bottom: -2px">
                            <div class="text-center">Parents</div>
                        </div>
                        <div class="col-md-4">
                            <hr style="border: solid 1px; margin-bottom: -2px">
                            <div class="text-center">Principal</div>
                        </div>
                    </div>
                </div>
            </div>

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
