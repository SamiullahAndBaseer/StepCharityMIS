<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/pass', function(){
    return Hash::make('sms@1234');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'admin', config('jetstream.auth_session'), 'verified'])->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });
});

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin/dashboard');
//     })->name('dashboard');
// });

Route::resource('/user', UserController::class);
Route::get('/get-districts/{id}', [UserController::class, 'getDistricts']);
Route::get('/get-villages/{id}', [UserController::class, 'getVillages']);
Route::get('/searchUsers', [UserController::class, 'searchUsers'])->name('searchUser');

Route::get('/user-attendance', [AttendanceController::class, 'index'])->name('user.attendance');
Route::post('/save/attendance', [AttendanceController::class, 'storeAttendance'])->name('save.attendance');

Route::get('/settings', [AttendanceController::class, 'setting'])->name('settings');
Route::post('/settings', [AttendanceController::class, 'updateSetting'])->name('update.settings');

Route::resource('/course', CourseController::class);
Route::post('/course/update', [CourseController::class, 'update'])->name('update.course');
Route::get('/course/del/{id}', [CourseController::class, 'destroy'])->name('delete.course');

Route::resource('/role', RoleController::class);
Route::post('/role/update', [RoleController::class, 'update'])->name('update.role');
Route::get('/role/del/{id}', [RoleController::class, 'destroy'])->name('delete.role');

Route::resource('teacher', TeacherController::class);
Route::resource('student', StudentController::class);
Route::get('/student', [StudentController::class, 'index'])->name('all.student');

// For Teachers View
// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/get-time', function(){
    echo (Carbon::parse("6:45:02")->format("h:i:s A"));
    dd(redirect()->route('student.index'));
});

Route::get('pdf', [PdfController::class, 'index']);