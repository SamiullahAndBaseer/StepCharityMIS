<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Leave_type;
use Illuminate\Support\Facades\Auth;
use App\Notifications\LeaveNotification;
use App\Models\User;

class TeacherLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::where('user_id', Auth::user()->id)->get();
        return view('teacher.leaves.teacher_leaves', ['leaves'=> $leaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Leave_type::all();
        return view('teacher.leaves.add_leave', ['types'=> $types]);
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

        return redirect()->route('th_leave.index')->with('message', 'Leave added successfully!');
    }
}
