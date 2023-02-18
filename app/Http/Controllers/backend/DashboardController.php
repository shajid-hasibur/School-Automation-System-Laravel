<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentAttendance;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{     
    
   

    public function index()
    {
   

        $data['students'] = count(AssignStudent::all());
        $data['employee'] = count(User::where('usertype', 'employee')->get());
        $data['teachers'] = count(User::where('usertype', 'teacher')->get());

        $date = date("Y-m-d");


        $data['present'] = count(StudentAttendance::where('date', $date)->where('attendance_status', 'Present')->get());
    
        $data['absent'] = count(StudentAttendance::where('date', $date)->where('attendance_status', 'Absent')->get());

        $data['leave'] = count(StudentAttendance::where('date', $date)->where('attendance_status', 'Leave')->get());


        $data['tpresent'] = count(EmployeeAttendance::where('date', $date)->where('attendance_status', 'Present')->get());
    
        $data['tabsent'] = count(EmployeeAttendance::where('date', $date)->where('attendance_status', 'Absent')->get());

        $data['tleave'] = count(EmployeeAttendance::where('date', $date)->where('attendance_status', 'Leave')->get());




;
        return view('admin.index', $data);
    }
}
