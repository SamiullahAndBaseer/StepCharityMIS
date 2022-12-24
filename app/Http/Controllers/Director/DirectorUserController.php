<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentAttendance;
use App\Models\Attendance;
use Illuminate\Support\Carbon;
use App\Models\Leave;

class DirectorUserController extends Controller
{
    // it shows all users.
    public function index(Request $request)
    {   
        $users = User::whereHas('role', function($q){
            $q->where('name', 'Employee')->OrWhere('name', 'Director');
        })->get();
        return view('director.users.employee_list', compact(['users']));
    }

    // user profile
    public function singleUser($id)
    {
        $user = User::findOrFail($id);

        if($user->role->name === 'Student'){
            $present_per_month = StudentAttendance::where('user_id', $user->id)
                    ->where('present', true)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
            
            $absent_per_month = StudentAttendance::where('user_id', $user->id)
                    ->where('present', false)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
                    
        }else{
            $present_per_month = Attendance::where('user_id', $user->id)
                    ->where('present', true)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
            
            $absent_per_month = Attendance::where('user_id', $user->id)
                    ->where('present', false)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
        }

        $leave_per_month = Leave::where('user_id', $user->id)
                    ->where('status', 'approved')
                    ->whereMonth('created_at', Carbon::now()->month)->count();

        return view('director.users.employee_profile', [
            'user'=> $user, 
            'present_per_month'=> $present_per_month,
            'absent_per_month'=> $absent_per_month,
            'leave_per_month' => $leave_per_month,
        ]);
    }
    
    public function userLeaves()
    {
        $leaves = Leave::orderBy('created_at', 'DESC')->get();
        return view('director.leaves.employee_leaves', ['leaves'=> $leaves]);
    }
}
