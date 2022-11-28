<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.feedbacks', ['feedbacks'=> $feedbacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feedback_types = FeedbackType::all();
        return view('admin.feedback.add_feedback', ['feedback_types'=> $feedback_types]);
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

        session()->flash('feedback_added', 'Feedback added successfully');
        return redirect()->back();
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
        $feedback = Feedback::findOrFail($id);
        $feedback_types = FeedbackType::all();
        return view('admin.feedback.edit_feedback', ['feedback'=> $feedback, 'feedback_types'=> $feedback_types]);
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

        session()->flash('feedback_updated', 'Feedback updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();
        session()->flash('feedback_deleted', 'Feedback deleted successfully');
        return response()->json([
            'status'=> 'success'
        ]);
    }
}
