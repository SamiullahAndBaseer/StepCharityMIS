<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\FeedbackType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::where('user_id', Auth::user()->id)->get();
        return view('student.feedback.feedbacks', ['feedbacks'=> $feedbacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feedback_types = FeedbackType::all();
        return view('student.feedback.add_feedback', ['feedback_types'=> $feedback_types]);
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
            'title'=> 'required',
            'description'=> 'required|max:255',
            'feedback_type_id' => 'required',
        ],[
            'feedback_type_id'=> 'The feedback type field is required.',
        ]);

        Feedback::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'feedback_type_id' => $request->feedback_type_id,
            'user_id'=> Auth::user()->id,
        ]);

        session()->flash('th_feedback', 'Feedback sent successfully');
        return redirect()->route('st_feedback.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback_types = FeedbackType::all();
        return view('student.feedback.edit_feedback', ['feedback'=> $feedback, 'feedback_types'=> $feedback_types]);
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
            'title'=> 'required',
            'description'=> 'required|max:255',
            'feedback_type_id' => 'required',
        ],[
            'feedback_type_id'=> 'The feedback type field is required.',
        ]);

        Feedback::findOrFail($id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'feedback_type_id' => $request->feedback_type_id,
            'user_id'=> Auth::user()->id,
        ]);

        session()->flash('th_feedback', 'Feedback updated successfully');
        return redirect()->route('st_feedback.index');
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
