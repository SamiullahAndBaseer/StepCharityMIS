<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Carbon;


class DirectorAttendanceController extends Controller
{
    public function index()
    {
        $attends = Attendance::whereDate('created_at', Carbon::today())->where('present', true)->get();
        return view("director.attendance", ['attends'=> $attends]);
    }

    // user attendance
    public function userAttendance()
    {
        $attends = User::whereHas('role', function($q){
            $q->where('name', 'Employee');
        })->join('attendances', 'users.id', 'attendances.user_id')->orderBy('attendances.created_at', 'DESC')->get();

        return view('director.users.user_attendance', ['attends'=> $attends]);
    }

    // teacher attendance
    public function teacherAttendance()
    {
        $attends = User::whereHas('role', function($q){
            $q->where('name', 'Teacher');
        })->join('attendances', 'users.id', 'attendances.user_id')->orderBy('attendances.created_at', 'DESC')->get();

        return view('director.teachers.teacher_attendance', ['attends'=> $attends]);
    }

    // student attendance
    public function studentAttendance()
    {
        $attends = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->join('attendances', 'users.id', 'attendances.user_id')->orderBy('attendances.created_at', 'DESC')->get();

        //->whereMonth('attendances.created_at', Carbon::now())

        return view('director.students.student_attendance', ['attends'=> $attends]);
    }
}
