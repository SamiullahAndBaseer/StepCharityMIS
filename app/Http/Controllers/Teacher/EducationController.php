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
use App\Models\Curriculum;

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
        $assignments = Assignment::join('lessons', 'lessons.id', 'assignments.lesson_id')
            ->where('lessons.user_id', Auth::user()->id)
            ->select('assignments.id', 'assignments.title', 'description', 'closing_date', 'score', 'file', 'assignments.lesson_id')
            ->get();
        return view('teacher.education.assignment.assignment_list', ['assignments'=> $assignments]);
    }

    // edit assignments
    public function editAssignment($id)
    {
        $assign = Assignment::findOrFail($id);
        $lessons = Course::join('lessons', 'courses.id', 'lessons.course_id')
            ->where('courses.id', $assign->lesson->course->id)->get();

        $courses = Course::join('teacher_courses', 'courses.id', 'teacher_courses.course_id')
            ->where('teacher_courses.user_id', Auth::user()->id)
            ->select('courses.id', 'courses.name')->get();

        return view('teacher.education.assignment.edit_assignment', [
            'assign'=>$assign, 
            'lessons'=> $lessons,
            'courses'=> $courses]);
    }

    // delete assignment
    public function deleteAssignment($id)
    {
        $assign = Assignment::findOrFail($id);
        $assign->delete();
        unlink(public_path('files/assignments/').$assign->file);
        session()->flash('assignment', 'Assignment deleted successfully');
        return response()->json([
            'status'=> 'done'
        ]);
    }

    // all curriculum
    public function allCurriculum()
    {
        $curriculums = Curriculum::all();
        return view('teacher.education.curriculum.curriculum_list', ['curriculums'=> $curriculums]);
    }

    // single course curriculum
    public function showCurriculum($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        return view('teacher.education.curriculum.show_curriculum', ['curriculum'=> $curriculum]);
    }

    // update assignment
    public function updateAssignment(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'description'=> 'required|string',
            'closing_date' => 'required',
            'score'=> 'required',
            'lesson'=> 'required',
            'course'=> 'required',
        ]);
        $assign = Assignment::findOrFail($id);

        $assign_file = $assign->file;
        if($request->file != null){
            $status = File::move(public_path('tmp/'.$request->file), public_path('files/assignments/'.$request->file));
            if($status){
                unlink(public_path('files/assignments/').$assign_file);
                $assign_file = $request->file;
            }
        }

        
        $assign->title = $request->title;
        $assign->description = $request->description;
        $assign->score = $request->score;
        $assign->file = $assign_file;
        $assign->closing_date = $request->closing_date;
        $assign->lesson_id = $request->lesson;
        $assign->save();

        session()->flash('assignment', 'Assignment updated successfully');
        return redirect()->route('all.assignments');
    }

    // add lesson  
    public function addLesson()
    {
        $courses = Course::join('teacher_courses', 'courses.id', 'teacher_courses.course_id')
            ->where('teacher_courses.user_id', Auth::user()->id)
            ->select('courses.id', 'courses.name')->get();

        return view('teacher.education.lessons.add_lesson', ['courses'=> $courses]);
    }

    // store lesson
    public function storeLesson(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|string',
            'course' => 'required'
        ]);

        $lesson_file = '';
        $status = File::move(public_path('tmp/'.$request->material), public_path('files/lessons/'.$request->material));
        if($status){
            $lesson_file = $request->material;
        }
        
        $lesson = new Lesson();
        $lesson->title = $request->title;
        $lesson->course_id = $request->course;
        $lesson->material = $lesson_file;
        $lesson->user_id = Auth::user()->id;
        $lesson->save();
        
        session()->flash('saved', 'Lesson added successfully!');
        return redirect()->route('all.lessons');
    }

    // all lesson for a teacher
    public function allLessons()
    {
        $lessons = Lesson::where('user_id', Auth::user()->id)->get();
        return view('teacher.education.lessons.lessons', ['lessons'=> $lessons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::join('teacher_courses', 'courses.id', 'teacher_courses.course_id')
            ->where('teacher_courses.user_id', Auth::user()->id)
            ->select('courses.id', 'courses.name')->get();

        return view('teacher.education.lessons.edit_lesson', ['lesson'=> $lesson, 'courses'=> $courses]);
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
        $this->validate($request, [
            'title'=> 'required|string',
            'course' => 'required'
        ]);

        $lesson = Lesson::findOrFail($id);

        $lesson_file = $lesson->material;
        if($request->material != null){
            $status = File::move(public_path('tmp/'.$request->material), public_path('files/lessons/'.$request->material));
            if($status){
                unlink(public_path('files/lessons/').$lesson_file);
                $lesson_file = $request->material;
            }
        }

        $lesson->title = $request->title;
        $lesson->course_id = $request->course;
        $lesson->material = $lesson_file;
        $lesson->user_id = Auth::user()->id;
        $lesson->save();
        
        session()->flash('saved', 'Lesson has been updated successfully!');
        return redirect()->route('all.lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        unlink(public_path('files/lessons/').$lesson->material);
        session()->flash('lesson_deleted', 'Lesson has been deleted successfully!');
        return response()->json([
            'status' => 'done',
        ]);
    }
}
