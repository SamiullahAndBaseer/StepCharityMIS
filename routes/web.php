<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Attendance;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Role;
use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

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

// All users authentication to their dashboard.
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('leave', LeaveController::class);
    // notifications
    Route::get('/delete-notify', [NotificationController::class, 'destroy'])->name('delete.notification');
    Route::get('/markAsRead', [NotificationController::class, 'markAsRead']);
});

// For admin
Route::middleware(['auth', 'admin'])->group(function(){
    Route::post('/upload', [UploadController::class, 'store'])->name('image');
    Route::post('/update/image/{id}', [UploadController::class, 'updateImage'])->name('update.image');
    Route::delete('/update/image/{id}', [UploadController::class, 'deleteImage'])->name('update.image');
    // For users
    Route::resource('/user', UserController::class);
    Route::get('/user/del/{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::post('/update/user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('/single-user/{id}', [UserController::class, 'singleUser'])->name('single.user');
    // For Teachers
    Route::resource('/teacher', TeacherController::class);
    Route::get('/teacher-delete/{id}', [TeacherController::class, 'destroy'])->name('delete.teacher');
    Route::post('/teacher-update/{id}', [TeacherController::class, 'update'])->name('update.teacher');
    // For Students
    Route::resource('/student', StudentController::class);
    Route::post('/student-update/{id}', [StudentController::class, 'update'])->name('update.student');
    Route::get('/student-delete/{id}', [StudentController::class, 'destroy'])->name('delete.student');
    // Roles
    Route::resource('/role', RoleController::class);
    Route::post('/role-update', [RoleController::class, 'update'])->name('update.role');
    Route::post('/role-delete', [RoleController::class, 'destroy'])->name('delete.role');
    // Courses
    Route::resource('/course', CourseController::class);
    Route::post('/course/update', [CourseController::class, 'update'])->name('update.course');
    Route::post('/course/delete', [CourseController::class, 'destroy'])->name('delete.course');
    // Branches
    Route::resource('/branch', BranchController::class);
    Route::post('/branch-update', [BranchController::class, 'update'])->name('update.branch');
    Route::post('/branch-delete', [BranchController::class, 'destroy'])->name('delete.branch');
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
    // LeaveTypes
    Route::resource('/leaveType', LeaveTypeController::class);
    Route::post('/leaveType/update', [LeaveTypeController::class, 'update'])->name('update.leaveType');
    Route::post('/leaveType/delete', [LeaveTypeController::class, 'destroy'])->name('delete.leaveType');
    // teacher and course
    Route::resource('teacher-course', TeacherCourseController::class);
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
    
});

// For Director view
Route::middleware(['auth', 'director'])->group(function(){
    Route::get('test', function(){
        return "Director works";
    });
});


Route::get('/get-districts/{id}', [UserController::class, 'getDistricts']);
Route::get('/get-villages/{id}', [UserController::class, 'getVillages']);
Route::get('/searchUsers', [UserController::class, 'searchUsers'])->name('searchUser');


Route::get('/get-time', function(){
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

