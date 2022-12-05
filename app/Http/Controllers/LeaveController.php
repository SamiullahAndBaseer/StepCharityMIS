<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Leave_type;
use App\Models\Role;
use App\Models\User;
use App\Notifications\LeaveNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    // for employee
    public function index()
    {
        $leaves = Leave::orderBy('created_at', 'DESC')->get();
        
        return view('admin.leaves.employee_leaves', ['leaves'=> $leaves]);
    }

    // for student
    public function studentLeave()
    {
        $leaves = Leave::orderBy('created_at', 'DESC')->get();
        
        return view('admin.leaves.student_leaves', ['leaves'=> $leaves]);
    }

    // for teachers
    public function teacherLeave()
    {
        $leaves = Leave::orderBy('created_at', 'DESC')->get();
        return view('admin.leaves.teacher_leaves', ['leaves'=> $leaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Leave_type::all();
        return view('admin.leaves.add_leave', ['types'=> $types]);
    }

    // save and send notification for admin
    public function store(Request $request)
    {
        $this->validate($request,[
            'from' => 'required|date',
            'to' => 'required|date',
            'reason' => 'required|max:255',
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

        return back()->with('message', 'Leave added successfully!');
    }

    // don't work
    public function search(Request $request)
    {
        $word = $request->wordSearch;
        return $word;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $leave = Leave::findOrFail($request->id);
        $leave->status = $request->status;
        $leave->save();

        $type = Leave_type::select('name')->where('id', $leave->leave_type_id)->first();

        $details = [
            'user_id' => Auth::user()->id,
            'name'=> $leave->status,
            'leave_type' => $type->name,
        ];

        $user = User::findOrFail($leave->user_id);
        $user->notify(new LeaveNotification($details));

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $leave = Leave::findOrFail($request->id);
        $leave->delete();

        session()->flash('message', 'Leave deleted successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }
}
