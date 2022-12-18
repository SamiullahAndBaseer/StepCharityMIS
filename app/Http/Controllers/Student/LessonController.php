<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Leave_type;
use App\Models\Lesson;
use App\Models\Leave;
use App\Notifications\LeaveNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::join('student_courses', 'student_courses.course_id', 'lessons.course_id')
                ->where('student_courses.user_id', Auth::user()->id)
                ->select('lessons.id','lessons.title', 'lessons.material', 'lessons.user_id', 'lessons.course_id', 'lessons.created_at')
                ->get();
        return view('student.education.lessons.lessons', ['lessons'=> $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Leave_type::all();
        return view('student.leaves.add_leave', ['types'=> $types]);
    }
    public function assignments()
    {
        $assignments = Assignment::join('lessons', 'lessons.id', 'assignments.lesson_id')
                    ->join('student_courses', 'student_courses.course_id', 'lessons.course_id')
                    ->where('student_courses.user_id', Auth::user()->id)
                    ->select('assignments.title', 'assignments.description', 'assignments.closing_date', 'assignments.score', 'assignments.file', 'assignments.lesson_id')
                    ->get();
        return view('student.education.assignment.assignment_list', ['assignments'=> $assignments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'from' => 'required|date',
            'to' => 'required|date',
            'reason' => 'required|max:155',
            'leave_type' => 'required'
        ]);

        $leave = new Leave();
        $leave->start_date = $request->from;
        $leave->end_date = $request->to;
        $leave->leave_reason = $request->reason;
        $leave->leave_type_id = $request->leave_type;
        $leave->user_id = Auth::user()->id;
        $leave->save();

        $type = Leave_type::select('name')->where('id', $request->leave_type)->first();

        $details = [
            'user_id' => Auth::user()->id,
            'name'=> Auth::user()->first_name,
            'leave_type' => $type->name,
        ];

        $admin = User::whereHas('role', function($q){
            $q->where('name', 'admin');
        })->first();

        $admin->notify(new LeaveNotification($details));

        return redirect()->back()->with('student_leave', 'Leave added successfully!');
    }
}
