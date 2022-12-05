<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->name;

        switch ($role) {
            case 'admin':
                $employees = User::whereHas('role', function($q){
                    $q->where('name', 'Employee');
                })->count();

                $students = User::whereHas('role', function($q){
                    $q->where('name', 'Student');
                })->count();

                $teachers = User::whereHas('role', function($q){
                    $q->where('name', 'Teacher');
                })->count();

                // for users bar chart
                $users = User::whereHas('role', function($q){
                                $q->where('name', 'Employee');
                            })->select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');

                $months = User::whereHas('role', function($q){
                                $q->where('name', 'Employee');
                            })->select(DB::raw("Month(created_at) as month"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('month');
                
                $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

                foreach($months as $index => $month)
                {
                    $datas[$month] = $users[$index];
                }
                // end user data

                // for teachers bar chart
                $users = User::whereHas('role', function($q){
                                $q->where('name', 'Teacher');
                            })->select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');

                $months = User::whereHas('role', function($q){
                                $q->where('name', 'Teacher');
                            })->select(DB::raw("Month(created_at) as month"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('month');
                
                $teacher_data = array(0,0,0,0,0,0,0,0,0,0,0,0);

                foreach($months as $index => $month)
                {
                    $teacher_data[$month] = $users[$index];
                }
                // end teacher data

                // for students bar chart
                $users = User::whereHas('role', function($q){
                                $q->where('name', 'Student');
                            })->select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');

                $months = User::whereHas('role', function($q){
                                $q->where('name', 'Student');
                            })->select(DB::raw("Month(created_at) as month"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('month');
                
                $student_data = array(0,0,0,0,0,0,0,0,0,0,0,0);

                foreach($months as $index => $month)
                {
                    $student_data[$month] = $users[$index];
                }
                // end student data

                // attendance present
                $present_months = Attendance::select(DB::raw("Month(created_at) as month"))
                            ->where('present', true)
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('month');

                $presents = Attendance::select(DB::raw("COUNT(*) as count"))
                            ->where('present', true)
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');
                            
                $presents_data = array(0,0,0,0,0,0,0,0,0,0,0,0);

                foreach($present_months as $index => $month)
                {
                    $presents_data[$month] = $presents[$index];
                }
                // absent

                return view('admin.dashboard',['employees'=> $employees, 'students'=> $students, 
                    'teachers'=> $teachers, 'datas'=> $datas,
                    'teacher_data'=> $teacher_data,
                    'student_data'=> $student_data,
                    'present_data' => $present_months]);
                break;

            case 'Student':
                return view('student.dashboard');
                break;

            case 'Teacher':
                return view('teacher.dashboard');
                break;

            case 'Employee':
                return view('employee.dashboard');
                break;

            case 'Director':
                return view('director.dashboard');
                break;
            
            default:
                return redirect()->route('login');
                break;
        }
    }
}
