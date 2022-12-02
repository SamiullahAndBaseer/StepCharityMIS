<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentAttendanceSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentAttendanceSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = StudentAttendanceSetting::all();
        $courses = Course::all();
        return view('admin.students.attendance_setting.index', ['settings'=> $settings, 'courses'=> $courses]);
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
            'course_id' => 'required',
            'start_attendance' => 'required', 
            'end_attendance' => 'required',
        ],[
            'course_id' => 'The course name is required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            StudentAttendanceSetting::create([
                'course_id' => $request->course_id, 
                'start_attendance' => $request->start_attendance, 
                'end_attendance' => $request->end_attendance,
            ]);
            
            return response()->json(['code'=> 1, 'msg'=> 'Course attendance added successfully.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = StudentAttendanceSetting::findOrFail($id);
        $courses = Course::all();
        return view('admin.students.attendance_setting.edit_setting', ['setting'=> $setting, 'courses'=> $courses]);
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
        $this->validate($request, [
            'course_id' => 'required',
            'start_attendance' => 'required',
            'end_attendance' => 'required'
        ],[
            'course_id' => 'The course name is required'
        ]);

        StudentAttendanceSetting::findOrFail($request->id)->update([
            'course_id' => $request->course_id, 
            'start_attendance' => $request->start_attendance, 
            'end_attendance' => $request->end_attendance,
        ]);

        session()->flash('att_updated', 'Course attendance updated successfully.');
        return redirect()->route('st-attend-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentAttendanceSetting::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
