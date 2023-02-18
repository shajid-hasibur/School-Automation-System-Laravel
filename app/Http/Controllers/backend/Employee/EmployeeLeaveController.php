<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    //
    public function EmployeeLeaveView()
    {
        $data['employee_data'] = EmployeeLeave::orderBy('id', 'DESC')->get();
        return view('backend.employee.employee_leave.employee_leave_view', $data);
    }

    //
    public function EmployeeLeaveCreate()
    {
        $data['employees'] = User::where('usertype', 'employee')->orWhere('usertype', 'teacher')->orWhere('usertype', 'operator')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_create', $data);
    }

    //
    public function EmployeeLeaveStore(Request $request)
    {
        // $request->validate([
        //     'employee_id' => 'required',
        //     'leave_purpose_id' => 'required',
        //     'leave_from' => 'required',
        //     'leave_to' => 'required',
        // ]);
            // $leave_purpose = new LeavePurpose();
            // $leave_purpose->name = $request->name;
            // $leave_purpose = $request->leave_purpose;
            // $leave_purpose->save();

            $id = LeavePurpose::insertGetId([
                "name" => $request->name,
                "created_at" => now(),
            ]);
        

        $employee_leave = new EmployeeLeave();
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->leave_purpose_id = $id;
        $employee_leave->leave_from = date('Y-m-d', strtotime($request->leave_from));
        $employee_leave->leave_to = date('Y-m-d', strtotime($request->leave_to));
        $employee_leave->save();

        $notification = array(
            'message' => 'Leave Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.leave.view')->with($notification);
    }

    //
    public function EmployeeLeaveEdit($id)
    {
        $data['employee_data'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype', 'employee')->orWhere('usertype', 'teacher')->orWhere('usertype', 'operator')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_edit', $data);

    }

    //
    public function EmployeeLeaveDelete($id)
    {
        $employee_leave = EmployeeLeave::find($id);
        $employee_leave->delete();
        LeavePurpose::where('id', $employee_leave->leave_purpose_id)->delete();

        $notification = array(
            'message' => 'Leave Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.leave.view')->with($notification);
    }
}
