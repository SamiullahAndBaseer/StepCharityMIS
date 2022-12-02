<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_course;
use App\Models\Teacher_course;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\File;
use App\Models\Assignment;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher_courses = Teacher_course::where('user_id', Auth::user()->id)->get();
        return view('teacher.education.teacher_course', [
            'teacher_courses'=> $teacher_courses]);
    }

    // for all student this teacher teach.
    public function all_st_course()
    {
        $st_courses = Student_course::join('teacher_courses', 'student_courses.course_id', 'teacher_courses.course_id')
            ->select('student_courses.user_id', 'student_courses.course_id', 'student_courses.created_at')
            ->where('teacher_courses.user_id', Auth::user()->id)->get();

        return view('teacher.education.student_course',[
            'st_courses' => $st_courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::join('teacher_courses', 'courses.id', 'teacher_courses.course_id')
            ->where('teacher_courses.user_id', Auth::user()->id)
            ->select('courses.id', 'courses.name')->get();

        return view('teacher.education.assignment.add_assignment', ['courses'=>$courses]);
    }

    // get lessons of a specific course
    public function getLessons(Request $request)
    {
        $value = $request->get('value');
        $data = Lesson::where('course_id', $value)->get();
        $output = '<option value="">Select Lesson</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->title.'</option>';
        }
        return response()->json($output);
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
            'title'=>'required|string',
            'description'=> 'required|string',
            'closing_date' => 'required',
            'score'=> 'required',
            'lesson'=> 'required',
            'course'=> 'required',
        ]);

        $file = '';
        $filename = $request->file;
        if($request->file == null){
            $filename = session()->get('assignment_file');
        }

        $status = File::move(public_path('tmp/'.$filename), public_path('files/assignments/'.$filename));
        if($status){
            $file = $filename;
        }

        $assign = new Assignment();
        $assign->title = $request->title;
        $assign->description = $request->description;
        $assign->score = $request->score;
        $assign->file = $file;
        $assign->closing_date = $request->closing_date;
        $assign->lesson_id = $request->lesson;
        $assign->save();

        session()->flash('assignment', 'Assignment added successfully');
        EducationController::sessionDestroy();
        return redirect()->route('th-course.index');
    }


    // for removing the session
    public static function sessionDestroy()
    {
        if(session()->has('filename')){
            $result = session()->remove('folder');
            return $result;
        }
    }

    // for store assignment file
    public function storeFile(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('tmp/', $filename);

            session()->put('assignment_file', $filename);
            return $filename;
        }

        return '';
    }

    // all assignments
    public function allAssignments()
    {
        $assignments = Assignment::all();
        return view('teacher.education.assignment.assignment_list', ['assignments'=> $assignments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
