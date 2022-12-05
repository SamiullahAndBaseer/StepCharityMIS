<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GraduatedStudent;
use App\Models\Course;
use App\Models\Student_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GraduatedController extends Controller
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

        $graduated_students = GraduatedStudent::all();
        return view('admin.students.graduated_student.students_list', [
            'students'=> $students, 
            'courses'=> $courses,
            'graduated_students'=> $graduated_students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'course_id' => 'required',
        ],[
            'student_id' => 'The student name is required',
            'course_id' => 'The course name is required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $already_exist = GraduatedStudent::where('student_id', $request->student_id)
                ->where('course_id', $request->course_id)->first();
            if($already_exist == null)
            {
                GraduatedStudent::create([
                    'student_id' => $request->student_id,
                    'course_id' => $request->course_id,
                ]);
    
                $student = User::findOrFail($request->student_id);
                $student->status = 0;
                $saved = $student->save();

                if($saved){
                    Student_course::where('user_id', $request->student_id)
                        ->where('course_id', $request->course_id)->delete();
                }
    
                return response()->json(['code'=> 1, 'msg'=> 'Graduated student added successfully.']);
            }else{
                return response()->json(['code'=> 2, 'msg'=> 'Graduated student already added.']);
            }
        }
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
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'course_id' => 'required',
        ],[
            'student_id' => 'The student name is required',
            'course_id' => 'The course name is required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            GraduatedStudent::findOrFail($request->id)->update([
                'student_id' => $request->student_id,
                'course_id' => $request->course_id,
            ]);

            return response()->json(['code'=> 1, 'msg'=> 'Graduated student updated successfully.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = GraduatedStudent::findOrFail($id)->delete();
        if($result){
            return response()->json([
                'status'=> 'success'
            ]);
        }
    }
}
