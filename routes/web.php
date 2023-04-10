<?php

use App\Http\Controllers\AdditionalSubController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\Account\AccountSalaryController;
use App\Http\Controllers\backend\Account\OtherAccountController;
use App\Http\Controllers\backend\Account\StudentFeeController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DefaultController;
use App\Http\Controllers\backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\backend\Employee\EmployeeMonthlySalaryController;
use App\Http\Controllers\backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\backend\Marks\GradeController;
use App\Http\Controllers\backend\Marks\MarksController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Report\AttendanceReportController;
use App\Http\Controllers\backend\Report\MarksheetController;
use App\Http\Controllers\backend\Report\ProfitController;
use App\Http\Controllers\backend\Report\ResultReportController;
use App\Http\Controllers\backend\Report\StudentIdCardController;
use App\Http\Controllers\backend\Setup\AssignSubjectController;
use App\Http\Controllers\backend\Setup\CalendarController;
use App\Http\Controllers\backend\Setup\DesignationController;
use App\Http\Controllers\backend\Setup\RoutineController;
use App\Http\Controllers\backend\Setup\ExamTypeController;
use App\Http\Controllers\backend\Setup\FeeCategoryAmountController;
use App\Http\Controllers\backend\Setup\FeeCategoryController;
use App\Http\Controllers\backend\Setup\LessonController;
use App\Http\Controllers\backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentSectionController;
use App\Http\Controllers\backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\Student\ExamFeeController;
use App\Http\Controllers\backend\Student\StudentAttendanceController;
use App\Http\Controllers\backend\Student\StudentLeaveController;
use App\Http\Controllers\userPremissionController;
use App\Http\Controllers\backend\Student\MonthlyFeeController;
use App\Http\Controllers\backend\Student\RegistrationFeeController;
use App\Http\Controllers\backend\Student\StudentRegistrationController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/home', function () {
    $routeName = auth()->user() && (auth()->user()->is_student || auth()->user()->is_teacher) ? 'calendar.index' : 'dashboard';
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});

Route::middleware(['auth:sanctum', 'verified', 'userpermission:dashboard'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'], function () {
    //
    Route::prefix('user')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('/create', [UserController::class, 'UserCreate'])->name('user.create');
        Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');



        // use role management routes
        Route::get('/role', [userPremissionController::class, 'UserRole'])->name('user.role');

        Route::post('/permission', [userPremissionController::class, 'userPermission'])->name('user.permission');


    });


    Route::group(['prefix'=>'profile', 'middleware'=>'userpermission:manage_profile'], function () {
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
        Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    });


    Route::group(['prefix'=>'setup', 'middleware'=>'userpermission:setup_management'], function () {
        // Student Class Routes
        Route::get('student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
        Route::get('student/class/create', [StudentClassController::class, 'StudentClassCreate'])->name('student.class.create');
        Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
        Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
        Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
        Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

        // Student Year Routes
        Route::get('student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
        Route::get('student/year/create', [StudentYearController::class, 'StudentYearCreate'])->name('student.year.create');
        Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
        Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
        Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
        Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

        // Student Group Routes
        Route::get('student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
        Route::get('student/group/create', [StudentGroupController::class, 'StudentGroupCreate'])->name('student.group.create');
        Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
        Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
        Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
        Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

        // Student Student Section Routes
        Route::get('student/section/view', [StudentSectionController::class, 'StudentSectionView'])->name('student.section.view');
        Route::get('student/section/create', [StudentSectionController::class, 'StudentSectionCreate'])->name('student.section.create');
        Route::post('student/section/store', [StudentSectionController::class, 'StudentSectionStore'])->name('student.section.store');
        Route::get('student/section/edit/{id}', [StudentSectionController::class, 'StudentSectionEdit'])->name('student.section.edit');
        Route::post('student/section/update/{id}', [StudentSectionController::class, 'StudentSectionUpdate'])->name('student.section.update');
        Route::get('student/section/delete/{id}', [StudentSectionController::class, 'StudentSectionDelete'])->name('student.section.delete');

        // Student Shift Routes
        Route::get('student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
        Route::get('student/shift/create', [StudentShiftController::class, 'StudentShiftCreate'])->name('student.shift.create');
        Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
        Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
        Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
        Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

        // Fee Category Routes
        Route::get('fee/category/view', [FeeCategoryController::class, 'FeeCategoryView'])->name('fee.category.view');
        Route::get('fee/category/create', [FeeCategoryController::class, 'FeeCategoryCreate'])->name('fee.category.create');
        Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCategoryStore'])->name('fee.category.store');
        Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
        Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee.category.update');
        Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

        // Fee Amount Routes
        Route::get('fee/amount/view', [FeeCategoryAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
        Route::get('fee/amount/create', [FeeCategoryAmountController::class, 'CreateFeeAmount'])->name('fee.amount.create');
        Route::post('fee/amount/store', [FeeCategoryAmountController::class, 'StoreFeeAmount'])->name('fee.amount.store');
        Route::get('fee/amount/edit/{fee_category_id}', [FeeCategoryAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
        Route::post('fee/amount/update/{fee_category_id}', [FeeCategoryAmountController::class, 'UpdateFeeAmount'])->name('fee.amount.update');
        Route::get('fee/amount/details/{fee_category_id}', [FeeCategoryAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');
        Route::get('fee/amount/delete/{fee_category_id}', [FeeCategoryAmountController::class, 'DeleteFeeAmount'])->name('fee.amount.delete');

        // Exam Type Routes
        Route::get('exam/type/view', [ExamTypeController::class, 'ExamTypeView'])->name('exam.type.view');
        Route::get('exam/type/create', [ExamTypeController::class, 'ExamTypeCreate'])->name('exam.type.create');
        Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');
        Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
        Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');
        Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

        //Subject Routes
        Route::get('subject/view', [SchoolSubjectController::class, 'SubjectView'])->name('subject.view');
        Route::get('subject/create', [SchoolSubjectController::class, 'SubjectCreate'])->name('subject.create');
        Route::post('subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('subject.store');
        Route::get('subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('subject.edit');
        Route::post('subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('subject.update');
        Route::get('subject/delete/{class_id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('subject.delete');

        //Assign Subject Routes
        Route::get('assign/subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');
        Route::get('assign/subject/create', [AssignSubjectController::class, 'AssignSubjectCreate'])->name('assign.subject.create');
        Route::post('assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');
        Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
        Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');
        Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetail'])->name('assign.subject.details');
        Route::get('assign/subject/delete/{class_id}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');

        //Assign additional subject routes
        Route::get('additional/search/student',[AdditionalSubController::class,'search'])->name('get.student');
        Route::get('get/student',[AdditionalSubController::class,'getStudent'])->name('student.list');
        Route::resource('additional', AdditionalSubController::class);

        //Designation Routes
        Route::get('designation/view', [DesignationController::class, 'DesignationView'])->name('designation.view');
        Route::get('designation/create', [DesignationController::class, 'DesignationCreate'])->name('designation.create');
        Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');
        Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
        Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
        Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');

        //Route
        Route::get('routine/view', [RoutineController::class, 'RoutineView'])->name('routine.view');
        Route::get('routine/create', [RoutineController::class, 'RoutineCreate'])->name('routine.create');
        Route::get('routine/store', [RoutineController::class, 'RoutineStore'])->name('routine.store');
    });

    //Student Management
    Route::group(['prefix'=>'student', 'middleware'=>'userpermission:student_management'], function () {
        //Student Registration Routes
        Route::get('registration/view', [StudentRegistrationController::class, 'StudentRegistrationView'])->name('student.registration.view');
        Route::get('registration/create', [StudentRegistrationController::class, 'StudentRegistrationCreate'])->name('student.registration.create');
        Route::post('registration/store', [StudentRegistrationController::class, 'StudentRegistrationStore'])->name('student.registration.store');
        Route::get('registration/edit/{student_id}', [StudentRegistrationController::class, 'StudentRegistrationEdit'])->name('student.registration.edit');
        Route::post('registration/update/{student_id}', [StudentRegistrationController::class, 'StudentRegistrationUpdate'])->name('student.registration.update');
        Route::get('registration/delete/{student_id}', [StudentRegistrationController::class, 'StudentRegistrationDelete'])->name('student.registration.delete');
        Route::get('year/class/wise', [StudentRegistrationController::class, 'StudentYearClassWise'])->name('student.year.class.wise');
        Route::get('registration/promotion/{student_id}', [StudentRegistrationController::class, 'StudentRegistrationPromotionView'])->name('student.registration.promotion');
        Route::post('registration/promotion/update/{student_id}', [StudentRegistrationController::class, 'StudentRegistrationPromotionUpdate'])->name('student.registration.promotion.update');
        Route::get('registration/promotion/details/{student_id}', [StudentRegistrationController::class, 'StudentRegistrationDetails'])->name('student.registration.promotion.details');

        // Registration Fee Routes
        Route::get('registration/fee/view', [RegistrationFeeController::class, 'RegistrationFeeView'])->name('registration.fee.view');
        Route::get('registration/fee/classwise', [RegistrationFeeController::class, 'RegistrationFeeClasswise'])->name('registration.fee.classwise');
        Route::get('registration/fee/payslip', [RegistrationFeeController::class, 'RegistrationFeePayslip'])->name('registration.fee.payslip');

        //Monthly Fee Routes
        Route::get('monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
        Route::get('monthly/fee/classwise', [MonthlyFeeController::class, 'MonthlyFeeClasswise'])->name('monthly.fee.classwise');
        Route::get('monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('monthly.fee.payslip');

        //Exam Fee Routes
        Route::get('exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
        Route::get('exam/fee/classwise', [ExamFeeController::class, 'ExamFeeClasswise'])->name('exam.fee.classwise');
        Route::get('exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('exam.fee.payslip');

        //Student Attendance Routes
        Route::get('attendance/view', [StudentAttendanceController::class, 'StudentAttendanceView'])->name('student.attendance.view');
        Route::get('attendance/create', [StudentAttendanceController::class, 'StudentAttendanceCreate'])->name('student.attendance.create');
        Route::get('attendance/getstudents', [StudentAttendanceController::class, 'StudentAttendanceGetStudents'])->name('student.attendance.getstudents');
        Route::get('attendance/viewstudents', [StudentAttendanceController::class, 'StudentAttendanceViewStudents'])->name('student.attendance.viewstudents');
        Route::post('attendance/store', [StudentAttendanceController::class, 'StudentAttendanceStore'])->name('student.attendance.store');

        Route::get('attendance/edit/{date}', [StudentAttendanceController::class, 'StudentAttendanceEdit'])->name('student.attendance.edit');

        Route::get('attendance/singleedit/{id}', [StudentAttendanceController::class, 'StudentAttendanceSingleEdit'])->name('student.attendance.single.edit');

        Route::post('attendance/singleedit/{id}', [StudentAttendanceController::class, 'StudentAttendanceSingleUpdate'])->name('student.attendance.single.update');

        Route::post('attendance/update/{date}', [StudentAttendanceController::class, 'StudentAttendanceUpdate'])->name('student.attendance.update');
        Route::get('attendance/details/{date}', [StudentAttendanceController::class, 'StudentAttendanceDetails'])->name('student.attendance.details');
        Route::get('attendance/delete/{id}', [StudentAttendanceController::class, 'StudentAttendanceDelete'])->name('student.attendance.delete');

    });

    //Employee Management
    Route::group(['prefix'=>'employee', 'middleware'=>'userpermission:employee_management'], function () {
        //Employee Registration Routes
        Route::get('registration/view', [EmployeeRegistrationController::class, 'EmployeeRegistrationView'])->name('employee.registration.view');
        Route::get('registration/create', [EmployeeRegistrationController::class, 'EmployeeRegistrationCreate'])->name('employee.registration.create');
        Route::post('registration/store', [EmployeeRegistrationController::class, 'EmployeeRegistrationStore'])->name('employee.registration.store');
        Route::get('registration/edit/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationEdit'])->name('employee.registration.edit');
        Route::post('registration/update/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationUpdate'])->name('employee.registration.update');
        Route::get('registration/details/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationDetails'])->name('employee.registration.details');
        Route::get('registration/delete/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationDelete'])->name('employee.registration.delete');

        //Employee Salary Routes
        Route::get('salary/view', [EmployeeSalaryController::class, 'EmployeeSalaryView'])->name('employee.salary.view');
        Route::get('salary/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('employee.salary.increment');
        Route::post('salary/increment/store/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryStore'])->name('employee.salary.increment.store');
        Route::get('salary/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetails'])->name('employee.salary.details');

        //Employee Leave Routes
        Route::get('leave/view', [EmployeeLeaveController::class, 'EmployeeLeaveView'])->name('employee.leave.view');
        Route::get('leave/create', [EmployeeLeaveController::class, 'EmployeeLeaveCreate'])->name('employee.leave.create');
        Route::post('leave/store', [EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('employee.leave.store');
        Route::get('leave/delete/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveDelete'])->name('employee.leave.delete');

        //Employee Attendance Routes
        Route::get('attendance/view', [EmployeeAttendanceController::class, 'EmployeeAttendanceView'])->name('employee.attendance.view');
        Route::get('attendance/create', [EmployeeAttendanceController::class, 'EmployeeAttendanceCreate'])->name('employee.attendance.create');
        Route::post('attendance/store', [EmployeeAttendanceController::class, 'EmployeeAttendanceStore'])->name('employee.attendance.store');
        Route::get('attendance/edit/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceEdit'])->name('employee.attendance.edit');
        Route::post('attendance/update/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceUpdate'])->name('employee.attendance.update');
        Route::get('attendance/details/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceDetails'])->name('employee.attendance.details');
        Route::get('attendance/delete/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceDelete'])->name('employee.attendance.delete');

        //Employee Monthly Salary Routes
        Route::get('monthly/salary/view', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryView'])->name('employee.monthly.salary.view');
        Route::get('monthly/salary/get', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryGet'])->name('employee.monthly.salary.get');
        Route::get('monthly/salary/payslip/{employee_id}', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
    });

    //Marks Routes
    Route::group(['prefix'=>'marks', 'middleware'=>'userpermission:mark_management'], function () {
        //Marks Routes
        // Route::get('view', [MarksController::class, 'MarksView'])->name('marks.view');
        Route::get('entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
        Route::post('entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');
        Route::get('entry/edit/', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
        Route::get('marks/edit/getstudents',[MarksController::class, 'MarksEditGetStudents'])->name('marks.edit.get.students');
        Route::post('entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');
        Route::get('details/{id}', [MarksController::class, 'MarksDetails'])->name('marks.details');
        Route::get('delete/{id}', [MarksController::class, 'MarksDelete'])->name('marks.delete');
        Route::get('marks/getstudents',[MarksController::class, 'GetStudents'])->name('marks.get.students');
        Route::get('marksexistence',[MarksController::class, 'MarksCheck'])->name('marks.check.existence');

        //Marks Grade Routes
        Route::get('grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.grade.view');
        Route::get('grade/create', [GradeController::class, 'MarksGradeCreate'])->name('marks.grade.create');
        Route::post('grade/store', [GradeController::class, 'MarksGradeStore'])->name('marks.grade.store');
        Route::get('grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
        Route::post('grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('marks.grade.update');
        Route::get('grade/delete/{id}', [GradeController::class, 'MarksGradeDelete'])->name('marks.grade.delete');
    });

    //Account Management Routes
    Route::group(['prefix'=>'account', 'middleware'=>'userpermission:account_management'], function () {
        //Student Fee Routes
        Route::get('student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
        Route::get('student/fee/create', [StudentFeeController::class, 'StudentFeeCreate'])->name('student.fee.create');
        Route::get('account/fee/getstudents', [StudentFeeController::class, 'StudentFeeGetStudents'])->name('account.fee.getstudents');
        Route::get('account/fee/getstudentsview', [StudentFeeController::class, 'StudentFeeGetStudentsView'])->name('account.fee.getstudentsview');
        Route::post('student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store');

        //Account Salary Routes
        Route::get('salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
        Route::get('salary/create', [AccountSalaryController::class, 'AccountSalaryCreate'])->name('account.salary.create');
        Route::post('salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');
        Route::get('salary/edit/{id}', [AccountSalaryController::class, 'AccountSalaryEdit'])->name('account.salary.edit');
        // Route::post('salary/update/{id}', [AccountSalaryController::class, 'AccountSalaryUpdate'])->name('account.salary.update');
        // Route::get('salary/delete/{id}', [AccountSalaryController::class, 'AccountSalaryDelete'])->name('account.salary.delete');
        Route::get('salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');

        //Other Account Routes
        Route::get('other/view', [OtherAccountController::class, 'AccountOtherView'])->name('account.other.view');
        Route::get('other/create', [OtherAccountController::class, 'AccountOtherCreate'])->name('account.other.create');
        Route::post('other/store', [OtherAccountController::class, 'AccountOtherStore'])->name('account.other.store');
        Route::get('other/edit/{id}', [OtherAccountController::class, 'AccountOtherEdit'])->name('account.other.edit');
        Route::post('other/update/{id}', [OtherAccountController::class, 'AccountOtherUpdate'])->name('account.other.update');
        Route::get('other/delete/{id}', [OtherAccountController::class, 'AccountOtherDelete'])->name('account.other.delete');
    });

    //Reoprt Routes
    Route::group(['prefix'=>'report', 'middleware'=>'userpermission:report'], function () {
        //Monthly Profit Report Routes
        Route::get('monthly/profit/view', [ProfitController::class, 'MonthlyProfitView'])->name('report.monthly.profit.view');
        Route::get('/profit/datewise', [ProfitController::class, 'MonthlyProfitDatewise'])->name('report.profit.datewise.get');
        Route::get('/profit/detailview', [ProfitController::class, 'MonthlyProfitDetailView'])->name('report.profit.detail.view');

        //Marksheet Generate Routes
        Route::get('marksheet/generate/view', [MarksheetController::class, 'MarksheetGenerateView'])->name('report.marksheet.generate.view');
        Route::get('/marksheet/getstudents', [MarksheetController::class, 'MarksheetGetStudents'])->name('report.marksheet.getstudents');

        //Attendance Report Routes
        Route::get('attendance/view', [AttendanceReportController::class, 'AttendanceView'])->name('report.attendance.view');
        Route::get('/attendance/getemployee', [AttendanceReportController::class, 'AttendanceGetEmployee'])->name('report.attendance.getemployee');

        //Student Result Report Routes
        Route::get('student/result/view', [ResultReportController::class, 'StudentResultView'])->name('report.student.result.view');
        Route::get('result/get', [ResultReportController::class, 'ResultGet'])->name('report.result.get');

        //Student ID Card Routes
        Route::get('student/idcard/view', [StudentIdCardController::class, 'StudentIdCardView'])->name('report.student.idcard.view');
        Route::get('/idcard/getstudents', [StudentIdCardController::class, 'StudentIdCardGetStudents'])->name('report.idcard.getstudents');

        Route::get('/idcard/pdf/{id}', [StudentIdCardController::class, 'StudentIdCardPdf'])->name('report.idcard.pdf');

    });

    Route::group(['prefix'=>'lesson', 'middleware'=>'userpermission:setup_management'], function () {
        Route::get('index', [LessonController::class, 'index'])->name('lessons.index');
        Route::get('create', [LessonController::class, 'create'])->name('lessons.create');
        Route::post('store', [LessonController::class, 'store'])->name('lessons.store');
        Route::get('edit/{lesson}', [LessonController::class, 'edit'])->name('lessons.edit');
        Route::get('update/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
        Route::get('show/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
        Route::get('delete/{id}', [LessonController::class, 'delete'])->name('lessons.delete');
    });


    Route::get('marks/getsubjects',[DefaultController::class, 'GetSubjects'])->name('marks.get.subjects');
    
    // Route::get('marks/getmarksexistence',[MarksController::class, 'MarksCheck'])->name('marks.check.existence');

    Route::get('attendance/getstudents',[DefaultController::class, 'AttendanceGetStudents'])->name('attendance.get.students');

    Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');

    //payment controller

    Route::get('make/student/payment',[PaymentController::class,'create'])->name('student.payment.create');

    Route::get('student/payment/search',[PaymentController::class,'searchStudent'])->name('student.payment.search');

    Route::get('student/fee/search',[PaymentController::class,'feeData'])->name('student.fee.search');

    Route::POST('student/payment/store',[PaymentController::class,'store'])->name('student.payment.store');

    Route::get('student/payment/history',[PaymentController::class,'index'])->name('student.payment.history');

    Route::get('student/payment/data',[PaymentController::class,'studentData'])->name('student.payment.data');


});
