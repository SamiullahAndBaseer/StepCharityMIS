<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Student_course;

class StudentCourseController extends Controller
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
        $courses = Course::all();

        $student_courses = Student_course::all();
        return view('admin.education.student_course', [
            'students'=> $students, 
            'courses'=> $courses,
            'student_courses'=> $student_courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'student_id' => 'required',
        ],
        [
            'course_id' => 'The course name is required',
            'student_id' => 'The student name is required',
        ]);

        $st_course = new Student_course();
        $st_course->course_id = $request->course_id;
        $st_course->user_id = $request->student_id;
        $st_course->save();

        session()->flash('saved', 'Student added for course successfully!');
        return response()->json([
            'status' => 'success',
        ]);
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
        $st_course = Student_course::findOrFail($request->id);
        $st_course->user_id = $request->student_id;
        $st_course->course_id = $request->course_id;
        $st_course->save();

        session()->flash('saved', 'Student course updated successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function destroy(Request $request)
    {
        $student_course = Student_course::findOrFail($request->id);
        $student_course->delete();

        session()->flash('saved', 'Student course deleted successfully!');
        return response()->json([
            'status'=> 'success',
        ]);
    }
}
