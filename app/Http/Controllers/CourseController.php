<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // all courses
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.all_courses', ['courses'=> $courses]);
    }

    // add new course
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:255|unique:courses,name',
            'description' => 'required',
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        session()->flash('message', 'Course Created Successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    // update course
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|max:255',
            'description' => 'required',
        ]);

        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        session()->flash('message', $course->name.' updated successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    // delete the course
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        session()->flash('message', 'Course deleted successfully!');
        
        return response()->json([
            'status' => 'success',
        ]);
    }
}
