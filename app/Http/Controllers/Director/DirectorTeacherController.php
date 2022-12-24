<?php

namespace App\Http\Controllers\Director;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Leave;

class DirectorTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::whereHas('role', function($q){
            $q->where('name', 'Teacher');
        })->get();
        
        return view('director.teachers.all_teachers', ['teachers'=> $teachers]);
    }

    public function teacherLeaves()
    {
        $leaves = Leave::orderBy('created_at', 'DESC')->get();
        return view('director.leaves.teacher_leaves', ['leaves'=> $leaves]);
    }
}
