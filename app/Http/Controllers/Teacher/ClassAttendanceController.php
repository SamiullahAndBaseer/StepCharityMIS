<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Course;
use App\Models\Student_course;
use App\Models\StudentAttendance;
use App\Models\StudentAttendanceSetting;
use Illuminate\Support\Facades\Auth;

class ClassAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attends = StudentAttendance::where('attendance_getter_id', Auth::user()->id)->get();
        return view('teacher.class.students_attendance_list', ['attends'=> $attends]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = explode(',', $request->qrCodeResult);
        $user_id = $result[0];

        $user_name = Student_course::where('course_id', $request->course_id)
            ->where('user_id', $user_id)->first();

        if($user_name == null)
        {
            return response()->json([
                'status'=> 'not_exist',
            ]);
        }

        $time = Carbon::now(); // Current Time
        $attend_time = StudentAttendanceSetting::where('course_id', $request->course_id)->first();

        if($time->betweenIncluded($attend_time->start_attendance, $attend_time->end_attendance))
        {
            $attend = StudentAttendance::where('user_id', $user_id)
            ->whereDate('created_at', Carbon::today())
            ->exists();

            // User already is present today.
            if($attend){
                return response()->json([
                    'status'=> 'user_exist',
                ]);

            }else{ // User present now.
                $attendance = new StudentAttendance();
                $attendance->user_id = $user_id;
                $attendance->time_in = Carbon::now()->toTimeString();
                $attendance->present = true;
                $attendance->course_id = $request->course_id;
                $attendance->attendance_getter_id = Auth::user()->id;
                $attendance->save();

                session()->flash('message', $user_name->user->first_name.' present successfully!');
                return response()->json([
                    'status' => 'success', 
                    'result' => $user_name->user->first_name,
                ]);
            }
        }else{
            // before the starting attendance
            return response()->json([
                'status' => 'time_out',
            ]);
        }
    }

    // save attendance today
    public function absentStudents($course_id)
    {
        $time= Carbon::now(); // Current Time
        $attend_time = StudentAttendanceSetting::where('course_id', $course_id)->first();
        if($time->isAfter($attend_time->end_attendance)){
            $students = Student_course::where('course_id', $course_id)->get();

            foreach($students as $user){
                if(!StudentAttendance::where('user_id', $user->user_id)->whereDate('created_at', Carbon::today())->exists()){
                    $attendance = new StudentAttendance();
                    $attendance->user_id = $user->user_id;
                    $attendance->time_in = Carbon::now()->toTimeString();
                    $attendance->course_id = $course_id;
                    $attendance->present = false;
                    $attendance->attendance_getter_id = Auth::user()->id;
                    $attendance->save();
                }
            }
        }

        return redirect()->route('class.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $attends = StudentAttendance::whereDate('created_at', Carbon::today())
            ->where('present', true)->where('attendance_getter_id', Auth::user()->id)
            ->where('course_id', $id)->get();
        return view("teacher.class.attendance", ['attends'=> $attends, 'course'=> $course]);
    }
}
