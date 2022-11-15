<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher_course;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherCourseController extends Controller
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
        $courses = Course::all();

        $teacher_courses = Teacher_course::all();
        return view('admin.education.teacher_course', [
            'teachers'=> $teachers, 
            'courses'=> $courses,
            'teacher_courses'=> $teacher_courses]);
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
            'teacher_id' => 'required',
        ],
        [
            'course_id' => 'The course name is required',
            'teacher_id' => 'The teacher name is required',
        ]);

        $th_course = new Teacher_course();
        $th_course->course_id = $request->course_id;
        $th_course->user_id = $request->teacher_id;
        $th_course->save();

        session()->flash('saved', 'Teacher add for course successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $th_course = Teacher_course::findOrFail($request->id);
        $th_course->user_id = $request->teacher_id;
        $th_course->course_id = $request->course_id;
        $th_course->save();

        session()->flash('saved', 'Teacher course updated successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    // delete
    public function destroy(Request $request)
    {
        $teacher_course = Teacher_course::findOrFail($request->id);
        $teacher_course->delete();

        session()->flash('saved', 'Teacher course deleted successfully!');
        return response()->json([
            'status'=> 'success',
        ]);
    }
}
