<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.education.lessons.lessons', ['lessons'=> $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.education.lessons.add_lesson', ['courses'=> $courses]);
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
        return redirect()->route('lesson.index');
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
        $courses = Course::all();
        return view('admin.education.lessons.edit_lesson', ['lesson'=> $lesson, 'courses'=> $courses]);
    }

    public function storeFile(Request $request)
    {
        if($request->hasFile('material')){
            $file = $request->file('material');
            $filename = $file->getClientOriginalName();
            $file->storeAs('tmp/', $filename);

            return $filename;
        }

        return '';
    }

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
        return redirect()->route('lesson.index');
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
        // return response()->json([
        //     'success' => true,
        // ]);
    }
}
