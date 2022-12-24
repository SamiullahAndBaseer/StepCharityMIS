<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\GraduatedStudent;
use App\Models\Leave;

class DirectorStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->get();
        return view('director.students.all_students', ['students'=> $students]);
    }

    // graduated students
    public function graduated()
    {
        $students = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->get();
        $courses = Course::all();

        $graduated_students = GraduatedStudent::all();
        return view('director.students.graduated_student.students_list', [
            'students'=> $students, 
            'courses'=> $courses,
            'graduated_students'=> $graduated_students]);
    }

    public function studentLeaves()
    {
        $leaves = Leave::orderBy('created_at', 'DESC')->get();
        return view('director.leaves.student_leaves', ['leaves'=> $leaves]);
    }
}
