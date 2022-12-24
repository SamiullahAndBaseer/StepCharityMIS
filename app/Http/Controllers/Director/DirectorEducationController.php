<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher_course;
use App\Models\User;
use App\Models\Student_course;

class DirectorEducationController extends Controller
{
    // all courses
    public function index()
    {
        $courses = Course::all();
        return view('director.courses.all_courses', ['courses'=> $courses]);
    }

    public function teacherCourse()
    {
        $teachers = User::whereHas('role', function($q){
            $q->where('name', 'Teacher');
        })->get();
        $courses = Course::all();

        $teacher_courses = Teacher_course::all();
        return view('director.education.teacher_course', [
            'teachers'=> $teachers, 
            'courses'=> $courses,
            'teacher_courses'=> $teacher_courses]);
    }

    public function studentCourse()
    {
        $students = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->get();
        $courses = Course::all();

        $student_courses = Student_course::all();
        return view('director.education.student_course', [
            'students'=> $students, 
            'courses'=> $courses,
            'student_courses'=> $student_courses]);
    }
}
