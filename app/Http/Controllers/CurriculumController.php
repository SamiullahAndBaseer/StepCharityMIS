<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('admin.education.curriculum.curriculum_list', ['curriculums'=> $curriculums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.education.curriculum.add_curriculum', ['courses'=> $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|string|max:255',
            'course_id' => 'required',
            'duration' => 'required|string',
            'description' => 'required',
        ],['course_id' => 'The course field is required',]);

        $curr = new Curriculum();
        $curr->title = $request->title;
        $curr->course_id = $request->course_id;
        $curr->duration = $request->duration;
        $curr->description = $request->description;
        $curr->save();

        session()->flash('curriculum', 'Curriculum added successfully!');
        return redirect()->route('curriculum.index');
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
        $curriculum = Curriculum::findOrFail($id);
        $courses = Course::all();
        return view('admin.education.curriculum.edit_curriculum', ['curriculum'=> $curriculum, 'courses'=> $courses]);
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
        $this->validate($request,[
            'title'=> 'required|string|max:255',
            'course_id' => 'required',
            'duration' => 'required|string',
            'description' => 'required',
        ],['course_id' => 'The course field is required',]);

        $curr = Curriculum::findOrFail($id);
        $curr->title = $request->title;
        $curr->course_id = $request->course_id;
        $curr->duration = $request->duration;
        $curr->description = $request->description;
        $curr->save();

        session()->flash('curriculum', 'Curriculum updated successfully.');
        return redirect()->route('curriculum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curriculum::findOrFail($id)->delete();
        session()->flash('curriculum', 'Curriculum deleted successfully.');
    }
}
