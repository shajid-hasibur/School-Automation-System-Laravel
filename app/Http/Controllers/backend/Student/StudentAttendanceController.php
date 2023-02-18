<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentAttendance;
use App\Models\User;
use App\Models\StudentSection;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\AssignStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StudentAttendanceController extends Controller
{
    //AttendanceView
    public function StudentAttendanceView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['sections'] = StudentSection::all();
        $data['shifts'] = StudentShift::all();

        return view('backend.student.student_attendance.student_attendance_view', $data);
    }

    //
    public function StudentAttendanceCreate()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['sections'] = StudentSection::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_attendance.student_attendance_create', $data);
    }


   


    //
    public function StudentAttendanceStore(Request $request)
    {
        // dd($request->all());
        StudentAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $count_student = count($request->student_id);
        for ($i = 0; $i < $count_student; $i++) {
            $attendance_status = 'attendance_status' . $i;
            $student_attendance = new StudentAttendance();
            $student_attendance->student_id = $request->student_id[$i];
            $student_attendance->roll = $request->student_roll[$i];
            $student_attendance->year_id = $request->student_year[$i];
            $student_attendance->class_id = $request->student_class[$i];
            $student_attendance->shift_id = $request->student_shift[$i];
            $student_attendance->section_id = $request->student_section[$i];
            $student_attendance->date = date('Y-m-d', strtotime($request->date));
            $student_attendance->attendance_status = $request->$attendance_status;
            $student_attendance->save();
        }
        $notification = array(
            'message' => 'Successfully Attendance Added',
            'alert-type' => 'success'
        );
        return redirect()->route('student.attendance.view')->with($notification);
    }

    //DateWise Edit
    public function StudentAttendanceEdit($date)
    {
        $data['editData'] = StudentAttendance::where('date', $date)->get();
        $data['students'] = User::where('usertype', 'student')->get();
        return view('backend.student.student_attendance.student_attendance_edit', compact('data'));
    }

    //Single Edit
    public function StudentAttendanceSingleEdit($id)
    {
        $attendance = StudentAttendance::find($id);
        // $data['students'] = User::where('usertype', 'student')->get();
        // dd($data);
        return view('backend.student.student_attendance.student_attendance_single_edit', compact('attendance'));
    }


    public function StudentAttendanceSingleUpdate(Request $request, $id){
        $attendence = StudentAttendance::find($id);

        $attendence->attendance_status = $request->attendance_status;

        $attendence->save();

        $notification = array(
            'message' => 'Attendance Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.attendance.view')->with($notification);
    }



    //
    public function StudentAttendanceUpdate(Request $request, $date)
    {
        StudentAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $count_student = count($request->student_id);
        for ($i = 0; $i < $count_student; $i++) {
            $attendance_status = 'attendance_status' . $i;
            $student_attendance = new StudentAttendance();
            $student_attendance->student_id = $request->student_id[$i];
            $student_attendance->roll = $request->student_roll[$i];
            $student_attendance->year_id = $request->student_year[$i];
            $student_attendance->class_id = $request->student_class[$i];
            $student_attendance->shift_id = $request->student_shift[$i];
            $student_attendance->sesction_id = $request->student_sesction[$i];
            $student_attendance->date = date('Y-m-d', strtotime($request->date));
            $student_attendance->attendance_status = $request->$attendance_status;
            $student_attendance->save();
        }
        $notification = array(
            'message' => 'Successfully Attendance Updated Added',
            'alert-type' => 'success'
        );
        return redirect()->route('student.attendance.view')->with($notification);
    }
    public function StudentAttendanceDetails($date)
    {
        $data['details'] = StudentAttendance::where('date', $date)->get();
        // dd($data);
        return view('backend.student.student_attendance.student_attendance_details', $data);
    }

    public function StudentAttendanceDelete($id)
    {
        $attendance = StudentAttendance::find($id);
        dd($attendance);
        $attendance->delete();
        $notification = array(
            'message' => 'Attendance Deleted Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    


    //Get Student List for Adding Attendance
    public function StudentAttendanceGetStudents(Request $request)
    {
        $year_id =$request->year_id;
        $class_id =$request->class_id;
        $shift_id =$request->shift_id;
        $section_id =$request->section_id;
        if($year_id != '')
        {
            $where[] = ['year_id', '=', $year_id.'%'];
        }
        if($class_id != '')
        {
            $where[] = ['class_id', '=', $class_id]
            ;
        }
        if($shift_id != '')
        {
            $where[] = ['shift_id', '=', $shift_id.'%'];
        }
        if($section_id != '')
        {
            $where[] = ['section_id', '=', $section_id.'%'];
        }

        $data = AssignStudent::with(['student', 'student_class', 'student_year', 'student_shift', 'student_section', 'group'])->where($where)->get();

        $html['thsource'] = '<th>Sl No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll</th>';
        $html['thsource'] .= '<th>Class</th>';
        $html['thsource'] .= '<th>Year</th>';
        $html['thsource'] .= '<th>Shift</th>';
        $html['thsource'] .= '<th>Section</th>';
        $html['thsource'] .= '<th>Attendance</th>';

        foreach($data as $key => $value){
                        
            $html[$key]['tdsource'] = '<td>' . ($key+1) .'<input type="hidden" name="student_id[]" value="'.$value->student_id.'">'. '</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value->roll.'<input type="hidden" name="student_roll[]" value="'.$value->roll.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student_class']['name'].'<input type="hidden" name="student_class[]" value="'.$value->class_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student_year']['year'].'<input type="hidden" name="student_year[]" value="'.$value->year_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student_shift']['shift_name'].'<input type="hidden" name="student_shift[]" value="'.$value->shift_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student_section']['section_name'].'<input type="hidden" name="student_section[]" value="'.$value->section_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.'<div class="custom-radio-button mt-3">'.'<div class="form-check-inline radio-success">'.'<input name="attendance_status'.$key.'" type="radio" id="present'.$key.'" value="Present" checked>'.'<label for="present'.$key.'">&nbsp;Present</label>'.'</div>'.'<div class="form-check-inline radio-danger">'.'<input name="attendance_status'.$key.'" type="radio" id="absent'.$key.'" value="Absent">'.'<label for="absent'.$key.'">&nbsp; Absent</label>'.'</div>'.'<div class="form-check-inline radio-info">'.'<input name="attendance_status'.$key.'" type="radio" id="leave{'.$key.'" value="Leave">'.'<label for="leave'.$key.'">&nbsp; Leave</label>'.'</div>'.'</div>'.'</td>';

        }
        return response()->json(@$html);
    }

    //Get Student List for Attendance View
    public function StudentAttendanceViewStudents(Request $request)
    {
        // $date = date('Y-m', strtotime($request->date));
        // dd($request->all());
        $year_id =$request->year_id;
        $class_id =$request->class_id;
        $shift_id =$request->shift_id;
        $section_id =$request->section_id;
        if(@$year_id != '')
        {
            $where[] = ['year_id', '=', $year_id];
        }
        if(@$class_id != '')
        {
            $where[] = ['class_id', '=', $class_id]
            ;
        }
        if(@$shift_id != '')
        {
            $where[] = ['shift_id', '=', $shift_id];
        }
        if(@$section_id != '')
        {
            $where[] = ['section_id', '=', $section_id];
        }

        $date = Carbon::createFromFormat('Y-m' , $request->date);
        $data = StudentAttendance::select('date')->whereMonth('date',$date->month)->groupBy('date')->where($where)->get();

       
       

        $html['thsource'] = '<th width="5%">Sl</th>';
        $html['thsource'] .= '<th>Date</th>';
        $html['thsource'] .= '<th>Total Present</th>';
        $html['thsource'] .= '<th>Absent</th>';
        $html['thsource'] .= '<th>Leave</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach($data as $key => $value){

            $absent = count(StudentAttendance::where('date',$value->date)->where($where)->where('attendance_status', 'Absent')->get());

            $present = count(StudentAttendance::where('date',$value->date)->where($where)->where('attendance_status', 'Present')->get());

            $leave = count(StudentAttendance::where('date',$value->date)->where($where)->where('attendance_status', 'Leave')->get());
                        
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.date('d-m-y', strtotime($value->date)).'</td>';

            $html[$key]['tdsource'] .= '<td>'.$present.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$absent .'</td>';
            $html[$key]['tdsource'] .= '<td>'.$leave .'</td>';

            $html[$key]['tdsource'] .= '<td style="white-space: nowrap; width: 15%;"> <a target="_blank" title="Details" href="'.route("student.attendance.details", $value->date).'" style="float: none;" class="btn btn-info"><i class="feather icon-eye"></i></a>'.'</td>';

        }
        return response()->json(@$html);
    }
}
