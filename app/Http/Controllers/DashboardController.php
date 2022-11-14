<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->name;

        switch ($role) {
            case 'admin':
                return view('admin.dashboard');
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
