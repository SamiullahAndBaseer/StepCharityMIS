<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceSettings;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $attends = Attendance::whereDate('created_at', Carbon::today())->where('present', true)->get();
        return view("admin.attendance", ['attends'=> $attends]);
    }

    // saving attendance in the database.
    public function storeAttendance(Request $request)
    {
        $result = explode(',', $request->qrCodeResult);
        $user_id = $result[0];


        $user_name = User::find($user_id);

        if($user_name == null)
        {
            return response()->json([
                'status'=> 'not_exist',
            ]);
        }

        $time= Carbon::now(); // Current Time
        $attend_time = AttendanceSettings::find(1);

        if($time->isBefore($attend_time->start_attendance_PM))
        {
            // For Morning Attendance
            if(Carbon::parse($time)->betweenIncluded($attend_time->start_attendance_AM, $attend_time->end_attendance_AM)){
                // echo $time ." is between ". $attend_time->start_attendance_AM." and ". $attend_time->end_attendance_AM;
                $attend = Attendance::where('user_id', $user_id)
                ->whereDate('created_at', Carbon::today())
                ->exists();

                // User already is present today.
                if($attend){
                    return response()->json([
                        'status'=> 'user_exist',
                    ]);

                }else{ // User present now.
                    $attendance = new Attendance();
                    $attendance->user_id = $user_id;
                    $attendance->time_in = Carbon::now()->toTimeString();
                    $attendance->present = true;
                    $attendance->attendance_getter_id = Auth::user()->id;
                    $attendance->save();

                    session()->flash('message', $user_name->first_name.' present successfully!');
                    return response()->json([
                        'status' => 'success', 
                        'result' => $user_name->first_name,
                    ]);
                }
            }else{
                // echo $time ." is not between ". $attend_time->start_attendance_AM." and ". $attend_time->end_attendance_AM;
                return response()->json([
                    'status' => 'time_out_AM',
                ]);
            }
        }else{
            // For Afternoon Attendance
            if(Carbon::parse($time)->betweenIncluded($attend_time->start_attendance_PM, $attend_time->end_attendance_PM))
            {
                $attend = Attendance::where('user_id', $user_id)
                        ->whereDate('updated_at', Carbon::now()->toDateTime())
                        ->where('time_out', null)
                        ->exists();

                if($attend){
                    // One time present Afternoon
                    $attendance = Attendance::where('user_id', $user_id)->where('time_out', null)->first();
                    $attendance->time_out = Carbon::now()->toTimeString();
                    $attendance->save();

                    session()->flash('message', 'You present successfully!');
                    return response()->json([
                        'status' => 'success',
                        'result' => $user_name->first_name,
                    ]);

                }else{
                    return response()->json([
                        'status' => 'afternoon'
                    ]);
                }
            }else{

                return response()->json([
                    'status' => 'time_out_PM',
                ]);
            }
        }
    }

    // Attendance Settings
    public function setting()
    {
        $setting = AttendanceSettings::find(1);
        $courses = Course::all();
        return view('admin.attendance_settings', ['setting'=> $setting, 'courses'=> $courses]);
    }

    // update time for attendance.
    public function updateSetting(Request $request)
    {
        // $attend_setting = new AttendanceSettings();
        $attend_setting = AttendanceSettings::find(1);
        $attend_setting->start_attendance_AM = $request->start_am;
        $attend_setting->end_attendance_AM = $request->end_am;
        $attend_setting->start_attendance_PM = $request->start_pm;
        $attend_setting->end_attendance_PM = $request->end_pm;
        $attend_setting->save();

        return back()->with('status', 'Attendance settings updated successfully.');
    }

    // save attendance today
    public function absentUsers()
    {
        $time= Carbon::now(); // Current Time
        $attend_time = AttendanceSettings::find(1);
        if($time->isAfter($attend_time->end_attendance_PM)){
            $users = User::whereHas('role', function($q){
                $q->where('name', 'Employee');
            })->get();

            foreach($users as $user){
                if(!Attendance::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->exists()){
                    $attendance = new Attendance();
                    $attendance->user_id = $user->id;
                    $attendance->time_in = Carbon::now()->toTimeString();
                    $attendance->time_out = Carbon::now()->toTimeString();
                    $attendance->present = false;
                    $attendance->attendance_getter_id = Auth::user()->id;
                    $attendance->save();
                }
            }
        }

        return redirect()->route('user.attendance');
    }

    // user attendance
    public function userAttendance()
    {
        $attends = User::whereHas('role', function($q){
            $q->where('name', 'Employee');
        })->join('attendances', 'users.id', 'attendances.user_id')->orderBy('attendances.created_at', 'DESC')->get();

        return view('admin.users.user_attendance', ['attends'=> $attends]);
    }

    // teacher attendance
    public function teacherAttendance()
    {
        $attends = User::whereHas('role', function($q){
            $q->where('name', 'Teacher');
        })->join('attendances', 'users.id', 'attendances.user_id')->orderBy('attendances.created_at', 'DESC')->get();

        return view('admin.teachers.teacher_attendance', ['attends'=> $attends]);
    }

    // absent teachers today
    public function absentTeachers()
    {
        $time= Carbon::now(); // Current Time
        $attend_time = AttendanceSettings::find(1);

        if($time->isAfter($attend_time->end_attendance_PM)){
            $users = User::whereHas('role', function($q){
                $q->where('name', 'Teacher');
            })->get();

            foreach($users as $user){
                if(!Attendance::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->exists()){
                    $attendance = new Attendance();
                    $attendance->user_id = $user->id;
                    $attendance->time_in = Carbon::now()->toTimeString();
                    $attendance->time_out = Carbon::now()->toTimeString();
                    $attendance->present = false;
                    $attendance->attendance_getter_id = Auth::user()->id;
                    $attendance->save();
                }
            }
        }

        return redirect()->route('teacher.attendance');
    }

    // student attendance
    public function studentAttendance()
    {
        $attends = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->join('attendances', 'users.id', 'attendances.user_id')->orderBy('attendances.created_at', 'DESC')->get();

        //->whereMonth('attendances.created_at', Carbon::now())

        return view('admin.students.student_attendance', ['attends'=> $attends]);
    }

    // student absent today
    public function absentStudents()
    {
        $time= Carbon::now(); // Current Time
        $attend_time = AttendanceSettings::find(1);
        if($time->isAfter($attend_time->end_attendance_PM)){
            $users = User::whereHas('role', function($q){
                $q->where('name', 'Student');
            })->get();

            foreach($users as $user){
                if(!Attendance::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->exists()){
                    $attendance = new Attendance();
                    $attendance->user_id = $user->id;
                    $attendance->time_in = Carbon::now()->toTimeString();
                    $attendance->time_out = Carbon::now()->toTimeString();
                    $attendance->present = false;
                    $attendance->attendance_getter_id = Auth::user()->id;
                    $attendance->save();
                }
            }
        }

        return redirect()->route('student.attendance');
    }
}
