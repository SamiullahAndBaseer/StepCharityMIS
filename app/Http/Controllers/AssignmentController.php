<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('admin.education.assignment.assignment_list', ['assignments'=> $assignments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $lessons = Lesson::all();
        return view('admin.education.assignment.add_assignment', ['courses'=>$courses, 'lessons'=> $lessons]);
    }

    public function storeFile(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('tmp/', $filename);

            return $filename;
        }

        return '';
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
        $status = File::move(public_path('tmp/'.$request->file), public_path('files/assignments/'.$request->file));
        if($status){
            $file = $request->file;
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
        return redirect()->route('assignment.index');
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
        $assign = Assignment::findOrFail($id);
        $lessons = Course::join('lessons', 'courses.id', 'lessons.course_id')
            ->where('courses.id', $assign->lesson->course->id)->get();
        $courses = Course::all();
        return view('admin.education.assignment.edit_assignment', [
            'assign'=>$assign, 
            'lessons'=> $lessons,
            'courses'=> $courses]);
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
        return redirect()->route('assignment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign = Assignment::findOrFail($id);
        $assign->delete();
        unlink(public_path('files/assignments/').$assign->file);
        session()->flash('assignment', 'Record deleted successfully');
    }
}
