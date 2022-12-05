<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackTypeController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MaktobController;
use App\Http\Controllers\MaktobTypeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportTypeController;
use App\Http\Controllers\RequestForItemController;
use App\Http\Controllers\SalaryReportController;
use App\Http\Controllers\StudentAttendanceSettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Teacher\ClassAttendanceController;
use App\Http\Controllers\Teacher\EducationController;
use App\Http\Controllers\Teacher\TeacherContractController;
use App\Http\Controllers\Teacher\TeacherFeedbackController;
use App\Http\Controllers\Teacher\TeacherLeaveController;
use App\Http\Controllers\Teacher\TeacherReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGuaranteeController;
use App\Models\Attendance;
use App\Models\EducationInfo;
use App\Models\Inventory;
use App\Models\Remittance;
use App\Models\StudentAttendanceSetting;
use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

// Route::get('/pass', function(){
//     return Hash::make('sms@1234');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('send-email', [MailController::class, 'sendEmail'])->name('send.email');


// All users authentication to their dashboard.
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // notifications
    Route::get('/delete-notify', [NotificationController::class, 'destroy'])->name('delete.notification');
    Route::get('/markAsRead', [NotificationController::class, 'markAsRead']);
    // Profile 
    Route::post('update-profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
    Route::post('add-education', [ProfileController::class, 'addEducation'])->name('add.education');
    Route::delete('education/{id}', [ProfileController::class, 'destroy']);
    Route::post('change-password', [ProfileController::class, 'updatePassword'])->name('update.password');
    Route::post('logout-other', [ProfileController::class, 'logoutOtherBrowser'])->name('logout.other');
    // Remittance
    Route::resource('remittance', RemittanceController::class);
    Route::post('remittance/save', [RemittanceController::class, 'store'])->name('store.remittance');
    Route::put('remittance-receive', [RemittanceController::class, 'onReceived'])->name('remittance.received');
    Route::post('remittance/{id}', [RemittanceController::class, 'destroy']);
    Route::post('remittance', [RemittanceController::class, 'update'])->name('update.remittance');
    // proposal for item 
    Route::resource('request-item', RequestForItemController::class);
    Route::post('request-image', [UploadController::class, 'requestItemImage'])->name('request.image');
    Route::post('request-update', [RequestForItemController::class, 'update'])->name('update.request-item');
    Route::post('request-item/{id}', [RequestForItemController::class, 'destroy']);
    // for quotations
    Route::resource('quotation', QuotationController::class);
    Route::post('bill-image', [QuotationController::class, 'billImage'])->name('quotation.bill');
    Route::post('quotation-update', [QuotationController::class, 'update'])->name('update.quotation');
    Route::post('quotation/{id}', [QuotationController::class, 'destroy']);
    Route::post('status-quotation', [QuotationController::class, 'statusFunction'])->name('quotation.status');
    // lesson file
    Route::post('lesson-file', [LessonController::class, 'storeFile'])->name('store.file');
    // single user
    Route::get('/single-user/{id}', [UserController::class, 'singleUser'])->name('single.user');
});

// For admin
Route::middleware(['auth', 'admin'])->group(function(){
    Route::post('/upload', [UploadController::class, 'store'])->name('image');
    Route::post('/update/image/{id}', [UploadController::class, 'updateImage'])->name('update.image');
    Route::post('/survey/image/{id}', [UploadController::class, 'updateSurveyImage'])->name('update.survey.image');
    Route::delete('/update/image/{id}', [UploadController::class, 'deleteImage'])->name('update.image');
    Route::post('guarantee/image/{id}', [UploadController::class, 'updateGuaranteeImage'])->name('update.guarantee.image');
    // for get district from a province
    Route::post('get-districts', [UserController::class, 'getDistricts'])->name('get.districts');
    // For users
    Route::resource('/user', UserController::class);
    Route::get('/user/del/{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::post('/update/user/{id}', [UserController::class, 'update'])->name('update.user');
    // For Teachers
    Route::resource('/teacher', TeacherController::class);
    Route::get('/teacher-delete/{id}', [TeacherController::class, 'destroy'])->name('delete.teacher');
    Route::post('/teacher-update/{id}', [TeacherController::class, 'update'])->name('update.teacher');
    // For Students
    Route::resource('/student', StudentController::class);
    Route::post('/student-update/{id}', [StudentController::class, 'update'])->name('update.student');
    Route::get('/student-delete/{id}', [StudentController::class, 'destroy'])->name('delete.student');
    // Attendance settings for students
    Route::resource('st-attend-setting', StudentAttendanceSettingController::class);
    Route::post('update-st-setting', [StudentAttendanceSettingController::class, 'update'])->name('update.st-course-att');
    // Attendance settings
    Route::get('/settings', [AttendanceController::class, 'setting'])->name('settings');
    Route::post('/settings', [AttendanceController::class, 'updateSetting'])->name('update.settings');  
    // attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::post('/save/attendance', [AttendanceController::class, 'storeAttendance'])->name('save.attendance');
    // user attendance
    Route::get('/user-attendance', [AttendanceController::class, 'userAttendance'])->name('user.attendance');
    Route::get('/absent-users', [AttendanceController::class, 'absentUsers']);
    Route::get('/teacher-attendance', [AttendanceController::class, 'teacherAttendance'])->name('teacher.attendance');
    Route::get('/absent-teachers', [AttendanceController::class, 'absentTeachers']);
    Route::get('/student-attendance', [AttendanceController::class, 'studentAttendance'])->name('student.attendance');
    Route::get('/absent-students', [AttendanceController::class, 'absentStudents']);
    // Leaves
    Route::get('/employee-leaves', [LeaveController::class, 'index'])->name('employee.leaves');
    Route::get('/student-leaves', [LeaveController::class, 'studentLeave'])->name('student.leaves');
    Route::get('/teacher-leaves', [LeaveController::class, 'teacherLeave'])->name('teacher.leaves');
    Route::post('/leave-update', [LeaveController::class, 'update'])->name('update.leave');
    Route::delete('leave-delete', [LeaveController::class, 'destroy'])->name('leave.delete');
    Route::get('/search', [LeaveController::class, 'search'])->name('leave.search');
    // teacher and course
    Route::resource('teacher-course', TeacherCourseController::class);
    Route::post('/teacher-course/delete', [TeacherCourseController::class, 'destroy'])->name('delete.teacher-course');
    Route::post('/teacher-course/update', [TeacherCourseController::class, 'update'])->name('update.teacher-course');
    // teacher and course
    Route::resource('student-course', StudentCourseController::class);
    Route::post('/student-course/delete', [StudentCourseController::class, 'destroy'])->name('delete.student-course');
    Route::post('/student-course/update', [StudentCourseController::class, 'update'])->name('update.student-course');
    // Maktob
    Route::resource('maktob', MaktobController::class);
    Route::post('/maktob-images', [UploadController::class, 'maktobImages'])->name('maktob.images');
    Route::delete('/maktob-images', [UploadController::class, 'delete']);
    Route::post('maktob/{id}', [MaktobController::class, 'destroy']);
    Route::post('maktob-update/{id}', [MaktobController::class, 'update'])->name('update.maktob');
    // Lessons
    Route::resource('lesson', LessonController::class);
    Route::post('lesson-update/{id}', [LessonController::class, 'update'])->name('update.lesson');
    Route::post('lesson/{id}', [LessonController::class, 'destroy']);
    // Curriculum
    Route::resource('curriculum', CurriculumController::class);
    Route::post('curriculum/{id}', [CurriculumController::class, 'destroy']);
    Route::post('curriculum-update/{id}', [CurriculumController::class, 'update'])->name('update.curriculum');
    // Assignment
    Route::resource('assignment', AssignmentController::class);
    Route::post('assignment-file', [AssignmentController::class, 'storeFile'])->name('save.file');
    Route::post('assignment-update/{id}', [AssignmentController::class, 'update'])->name('update.assignment');
    Route::post('assignment/{id}', [AssignmentController::class, 'destroy']);
    // Certificate 
    Route::resource('certificate', CertificateController::class);
    Route::post('/certificate/{id}', [CertificateController::class, 'destroy']);
    Route::post('/update/certificate/{id}', [CertificateController::class, 'update'])->name('update.certificate');
    // Roles
    Route::resource('/role', RoleController::class);
    // Courses
    Route::resource('/course', CourseController::class);
    // Branches
    Route::resource('/branch', BranchController::class);
    // Report Type
    Route::resource('report-types', ReportTypeController::class);
    // LeaveTypes
    Route::resource('/leaveType', LeaveTypeController::class);
    Route::resource('leave', LeaveController::class);
    // Maktob Types
    Route::resource('maktob-type', MaktobTypeController::class);
    // Contract Type
    Route::resource('contract-type', ContractTypeController::class);
    // Feedback type
    Route::resource('feedback-type', FeedbackTypeController::class);
    // Feedback
    Route::resource('feedback', FeedbackController::class);
    Route::post('feedback/{id}', [FeedbackController::class, 'update'])->name('update.feedback');
    // Contract
    Route::resource('contract', ContractController::class);
    Route::post('/contract/update/{id}', [ContractController::class, 'update'])->name('update.contract');
    Route::post('/contract/{id}', [ContractController::class, 'destroy']);
    // Report
    Route::resource('report', ReportController::class);
    Route::post('/report-update/{id}', [ReportController::class, 'update'])->name('update.report');
    Route::post('/report/{id}', [ReportController::class, 'destroy']);
    // Survey
    Route::resource('survey', SurveyController::class);
    Route::post('survey/{id}', [SurveyController::class, 'update'])->name('update.survey');
    Route::post('/delete/survey/{id}', [SurveyController::class, 'destroy']);
    Route::put('update-status', [SurveyController::class, 'updateStatus'])->name('status.survey');
    // User Guarantee 
    Route::resource('guarantee', UserGuaranteeController::class);
    Route::get('guarantee/create/{id}', [UserGuaranteeController::class, 'create'])->name('create.guarantee');
    Route::post('guarantee/update', [UserGuaranteeController::class, 'update'])->name('update.guarantee');
    Route::post('guarantee/delete/{id}', [UserGuaranteeController::class, 'destroy']);
    // Inventory
    Route::resource('inventory', InventoryController::class);
    Route::post('inventory-update', [InventoryController::class, 'update'])->name('update.inventory');
    Route::post('inventory/{id}', [InventoryController::class, 'destroy']);
    // Category
    Route::resource('category', CategoryController::class);
    Route::post('category-update', [CategoryController::class, 'update'])->name('update.category');
    // Salary Reports
    Route::resource('salary-report', SalaryReportController::class);
    Route::post('salary-report/{id}', [SalaryReportController::class, 'destroy']);
    Route::post('salary-report/paid/{id}', [SalaryReportController::class, 'paidSalary']);
    // graduated students
    Route::resource('graduated', GraduatedController::class);
    Route::post('graduated-update', [GraduatedController::class, 'update'])->name('update.graduate');
    // send whatsapp message
    Route::post('send-whatsapp', [MessageController::class, 'sendWhatsappMsg'])->name('whatsapp.msg');
});

// For Student view
Route::middleware(['auth', 'student'])->group(function(){
    Route::get('pdf', [PdfController::class, 'index']);
});

// For Employee view
Route::middleware(['auth', 'employee'])->group(function(){
    
});

// For Teacher view
Route::middleware(['auth', 'teacher'])->group(function(){
    Route::resource('th-course', EducationController::class);
    Route::get('st-course', [EducationController::class, 'all_st_course']);
    Route::post('file-assignment', [AssignmentController::class, 'storeFile'])->name('assignment.file');
     // for get lesson of a specific course
    Route::post('get-lessons', [EducationController::class, 'getLessons'])->name('get.lessons');
    Route::get('all_assignment', [EducationController::class, 'allAssignments'])->name('all.assignments');
    Route::get('edit/assignment/{id}', [EducationController::class, 'editAssignment'])->name('edit.assignment');
    Route::post('edit/assignment/{id}', [EducationController::class, 'updateAssignment'])->name('th_assignment.update');
    Route::delete('delete/assignment/{id}', [EducationController::class, 'deleteAssignment']);
    // lesson
    Route::get('add/lesson', [EducationController::class, 'addLesson'])->name('add.lesson');
    Route::post('save/lesson', [EducationController::class, 'storeLesson'])->name('store.lesson');
    Route::get('all/lessons', [EducationController::class, 'allLessons'])->name('all.lessons');
    Route::post('update/lesson/{id}', [EducationController::class, 'update'])->name('th_lesson.update');
    // Curriculum
    Route::get('th_curriculums', [EducationController::class, 'allCurriculum'])->name('all.th_curriculum');
    Route::get('th_curriculum/{id}', [EducationController::class, 'showCurriculum'])->name('show.th_curriculum');
    // feedback
    Route::resource('th_feedback', TeacherFeedbackController::class);
    Route::post('th_feedback/update/{id}', [TeacherFeedbackController::class, 'update'])->name('th_feedback.update');
    // Leave
    Route::resource('th_leave', TeacherLeaveController::class);
    // contract
    Route::resource('th_contract', TeacherContractController::class);
    // report
    Route::resource('th_report', TeacherReportController::class);
    Route::get('th_report/show/{id}', [TeacherReportController::class, 'show'])->name('th_report.show');
    // attendance of a specific course
    Route::resource('class', ClassAttendanceController::class);
    Route::get('class_absent/{course_id}', [ClassAttendanceController::class, 'absentStudents'])->name('class.absents');
});

// For Director view
Route::middleware(['auth', 'director'])->group(function(){
    Route::get('test', function(){
        return "Director works";
    });
});

Route::get('/searchUsers', [UserController::class, 'searchUsers'])->name('searchUser');

use App\Models\Student_course;

Route::get('/get-time', function(){
    $user_name = Student_course::where('course_id', 14)
            ->where('user_id', 25)->first();
            dd($user_name->user->first_name);
    foreach(Attendance::all() as $item){
        return Carbon::now()->year;
    }
    // echo (Carbon::parse("6:45:02")->format("h:i:s A"));
    // dd(redirect()->route('student.index'));
});

Route::get('tmp-delete', function(){
    foreach(TemporaryFiles::all() as $item){
        if($item->new_photo){
            unlink(public_path('tmp/'.$item->folder).'/'.$item->new_photo);
        }else{
            unlink(public_path('tmp/'.$item->folder).'/'.$item->filename);
        }
        
        rmdir(public_path('tmp/'.$item->folder));
        $item->delete();
    }
    return 'done';
});


