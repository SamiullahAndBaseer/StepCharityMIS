<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackType;
use Illuminate\Http\Request;

class FeedbackTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback_types = FeedbackType::all();
        return view('admin.feedback_type.feedbacks', ['feedback_types'=> $feedback_types]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:255|unique:feedback_types,name',
            'description' => 'required',
        ]);
 
        $feedback_type = new FeedbackType();
        $feedback_type->name = $request->name;
        $feedback_type->description = $request->description;
        $feedback_type->save();
 
        session()->flash('feedback_type', 'Feedback type created Successfully!');

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|max:255',
            'description' => 'required',
        ]);
 
        $feedback_type = FeedbackType::findOrFail($id);
        $feedback_type->name = $request->name;
        $feedback_type->description = $request->description;
        $feedback_type->save();
 
        session()->flash('feedback_type', 'Feedback type updated Successfully!');

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback_type = FeedbackType::find($id);
        $feedback_type->delete();
        
        $feedbacks = Feedback::where('feedback_type_id', $feedback_type->id)->get();
        foreach($feedbacks as $feedback){
                $feedback->delete();
        }

        session()->flash('feedback_type', 'Feedback type deleted Successfully!');

        return response()->json([
            'status' => 'success',
        ]);
    }
}
