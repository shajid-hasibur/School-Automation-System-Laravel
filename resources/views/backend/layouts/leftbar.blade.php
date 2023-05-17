@php
$user = auth()->user()->load(['permission'])->toArray();

$array = $user['permission'];

// $array = ['dashboard', 'manage_profile', 'setup_management', 'student_management', 'employee_management', 'mark_management', 'account_management', 'result', 'report'];



@endphp

<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logo bar -->
        <div class="logobar d-flex">
            <a href="{{url('/')}}" class="logo logo-large"><img src="{{ asset('backend/assets/images/ums1.png') }}" class="img-responsive" alt="logo" style="width:60px; height:60px; margin-left:14px"></a>
            {{-- <a href="{{url('/')}}" class="logo logo-small"><img src="{{ asset('backend/assets/images/small_logo.svg') }}" class="img-fluid" alt="logo"></a> --}}
            <h6 style="color:rgb(251, 255, 0);margin-top:22px">Unique Model School</h6>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigation bar -->
        <div class="navigationbar">
            <ul class="vertical-menu">

                @if($array['dashboard'])
                <li class="">
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-dashcube"></i><span>Dashboard</span>
                    </a>
                </li>

                @endif


                @if(Auth::user()->usertype == 'admin')
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-user-circle-o"></i><span>User</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('user.view') }}">User List</a></li>
                        <li><a href="{{ route('user.create') }}">User Add</a></li>
                        <li><a href="{{ route('user.role') }}">User Role</a></li>
                    </ul>
                </li>
                @endif

                @if($array['manage_profile'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-slideshare"></i><span>Manage Profile</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('profile.view') }}">Profile</a></li>
                        <li><a href="{{ route('password.view') }}">Change Password</a></li>
                    </ul>
                </li>
                @endif


                @if($array['setup_management'])
                <li>
                    <a href="javaScript:void();">
                        <i class="ion ion-ios-settings"></i><span>Setup Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('student.class.view') }}">Student Class</a></li>
                        <li><a href="{{ route('student.year.view') }}">Student Year</a></li>
                        <li><a href="{{ route('student.group.view') }}">Student Group</a></li>
                        <li><a href="{{ route('student.shift.view') }}">Student Shift</a></li>
                        <li><a href="{{ route('student.section.view') }}">Student Section</a></li>
                        <li><a href="{{ route('fee.category.view') }}">Fee Category</a></li>
                        <li><a href="{{ route('fee.amount.view') }}">Fee Category Amount</a></li>
                        <li><a href="{{ route('exam.type.view') }}">Exam Type</a></li>
                        <li><a href="{{ route('subject.view') }}">Subject</a></li>
                        <li><a href="{{ route('assign.subject.view') }}">Assign Subject</a></li>
                        <li><a href="{{ route('additional.index') }}">Additional Subject</a></li>
                        <li><a href="{{ route('designation.view') }}">Designation</a></li>
                        {{-- <li><a href="{{ route('routine.view') }}">Routine</a></li> --}}
                    </ul>
                </li>
                @endif

                @if($array['student_management'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-mortar-board"></i></i><span>Student Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('student.registration.view')}}">Student Registration</a></li>
                        {{-- <li><a href="{{route('registration.fee.view')}}">Registration Fee</a></li> --}}
                        {{-- <li><a href="{{route('monthly.fee.view')}}">Monthly Fee</a></li> --}}
                        <li><a href="{{ route('student.attendance.view') }}">Student Attendance</a></li>
                        {{-- <li><a href="{{route('exam.fee.view') }}">Exam Fee</a></li> --}}
                    </ul>
                </li>
                @endif

                @if($array['employee_management'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-users"></i><span>Employee Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('employee.registration.view') }}">Employee Registration</a></li>
                        <li><a href="{{ route('employee.salary.view') }}">Employee Salary</a></li>
                        <li><a href="{{ route('employee.leave.view') }}">Employee Leave</a></li>
                        <li><a href="{{ route('employee.attendance.view') }}">Employee Attendance</a></li>
                        <li><a href="{{ route('employee.monthly.salary.view') }}">Employee Monthly Salary</a></li>
                    </ul>
                </li>
                @endif


                @if($array['mark_management'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-shekel"></i><span>Marks Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('marks.entry.add') }}">Marks Entry</a></li>
                        <li><a href="{{ route('marks.entry.edit') }}">Marks Edit</a></li>
                        <li><a href="{{ route('marks.grade.view') }}">Marks Grade</a></li>
                    </ul>
                </li>
                @endif

                @if($array['account_management'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-money"></i><span>Account Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        {{-- <li><a href="{{ route('student.fee.view') }}">Student Fee</a></li> --}}
                        <li><a href="{{ route('request.payment') }}">Request for Payment</a></li>
                        <li><a href="{{ route('fee.page') }}">Student Payment</a></li>
                        {{-- <li><a href="{{ route('student.payment.create') }}">Student Payment</a></li>
                        <li><a href="{{ route('student.payment.history') }}">Payment History</a></li> --}}
                        <li><a href="{{ route('account.salary.view') }}">Employee Salary</a></li>
                        <li><a href="{{ route('account.other.view') }}">Others</a></li>
                    </ul>
                </li>
                @endif


                @if($array['result'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-file-text-o"></i><span>Result</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">

                        <li><a href="{{ route('report.marksheet.generate.view') }}">Marksheet</a></li>

                        <li><a href="{{ route('report.student.result.view') }}">Student Result</a></li>
                        <li><a href="{{ route('report.student.idcard.view') }}">Student ID Card</a></li>
                    </ul>
                </li>
                @endif


                @if($array['report'])
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-sort-amount-desc"></i><span>Report</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        {{-- <li><a href="{{ route('report.monthly.profit.view') }}">Monthly Profit</a></li> --}}
                        <li><a href="{{ route('fee.collection.page') }}">Collection Report</a></li>
                        <li><a href="{{ route('report.attendance.view') }}">Attendance Report</a></li>
                    </ul>
                </li>
                @endif


                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-th-list"></i><span>Routine</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">

                        <li><a href="{{ route('lessons.index') }}">Lesson</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('calendar.index') }}">
                        <i class="fa fa-file-text-o"></i><span>Timetable</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Navigation bar -->
    </div>
    <!-- End Sidebar -->
</div>
