<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Survey;
use App\Models\TemporaryFiles;
use App\Models\User;
use App\Models\UserGuarantee;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        return view('admin.survey.survey_list', ['surveys'=> $surveys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $courses = Course::all();
        $currencies = Currency::all();
        return view('admin.survey.add_survey', ['branches'=> $branches, 'courses'=> $courses, 'currencies'=> $currencies]);
    }

    public function updateStatus(Request $request)
    {
        $survey = Survey::findOrFail($request->id);
        $survey->status = $request->status;
        $survey->save();

        if($request->status == 'approved')
        {
            $role = Role::where('name', 'Student')->first();

            $marital_status = 0;
            if($survey->marital_status == 'married'){
                $marital_status = 1;
            }

            User::create([
                'first_name' => $survey->first_name,
                'last_name' => $survey->last_name,
                'father_name' => $survey->father_name,
                'phone_number' => $survey->primary_phone_number,
                'id_card_number' => $survey->id_card_number,
                'salary' => $survey->salary,
                'bio' => $survey->bio,
                'gender' => $survey->gender,
                'marital_status' => $marital_status,
                'date_of_birth' => $survey->date_of_birth,
                'status' => 1,
                'join_date' => $survey->created_at,
                'role_id' => $role->id,
                'branch_id' => $survey->branch_id,
                'currency_id' => $survey->currency_id,
                'email' => $survey->email,
                'profile_photo_path' => $survey->photo,
                'password' => Hash::make('sms@1234'),
            ]);
            
            File::copy(public_path('images/surveys/'.$survey->photo), public_path('images/'.$survey->photo));
        }

        return response()->json([
            'status' => 'success',
        ]);
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
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'father_name' => 'required|string|max:64',
            'primary_phone_number' => 'required|unique:surveys,primary_phone_number',
            'whatsapp_number' => 'required|unique:surveys,whatsapp_number',
            'id_card_number' => 'required|unique:surveys,id_card_number',
            'gender' => 'required',
            'salary' => 'required|numeric',
            'bio' => 'required|max:100',
            'currency_id' => 'required',
            'marital_status' => 'required',
            'date_of_birth' => 'required|date',
            'branch_id' => 'required',
            'email' => 'required|email|unique:surveys,email',
            'mosque_name' => 'required|string',
            'description' => 'required|string|max:128',
            'original_location' => 'required|string|max:128',
            'current_location' => 'required|string|max:128',
            'question_one' => 'required|string|max:128',
            'question_two' => 'required|string|max:128',
            'question_three' => 'required|string|max:128',
            'question_four' => 'required|string|max:128',
            'course_id' => 'required',
        ], [
            'currency_id' => 'The currency field is required.'
        ]);
        

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = '';
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/surveys/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                $temporaryFile->delete();
            }    
        }

        Survey::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'primary_phone_number' => $request->primary_phone_number,
            'whatsapp_number' => $request->whatsapp_number,
            'id_card_number' => $request->id_card_number,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'bio' => $request->bio,
            'currency_id' => $request->currency_id,
            'marital_status' => $request->marital_status,
            'date_of_birth' => $request->date_of_birth,
            'branch_id' => $request->branch_id,
            'email' => $request->email,
            'photo' => $photo,
            'mosque_name' => $request->mosque_name,
            'description' => $request->description,
            'original_location' => $request->original_location,
            'current_location' => $request->current_location,
            'question_one' => $request->question_one,
            'question_two' => $request->question_two,
            'question_three' => $request->question_three,
            'question_four' => $request->question_four,
            'course_id' => $request->course_id,
        ]);

        session()->flash('survey_created', 'Survey added successfully');
        return redirect()->route('survey.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        $courses = Course::all();
        $branches = Branch::all();
        $currencies = Currency::all();
        return view('admin.survey.edit_survey', ['survey'=> $survey, 'courses'=> $courses,
            'branches'=> $branches,
            'currencies'=> $currencies]);
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
        $survey = Survey::findOrFail($id);
        $this->validate($request, [
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'father_name' => 'required|string|max:64',
            'primary_phone_number' => 'required',
            'whatsapp_number' => 'required',
            'id_card_number' => 'required',
            'gender' => 'required',
            'salary' => 'required|numeric',
            'bio' => 'required|max:100',
            'currency_id' => 'required',
            'marital_status' => 'required',
            'date_of_birth' => 'required|date',
            'branch_id' => 'required',
            'email' => 'required|email',
            'mosque_name' => 'required|string',
            'description' => 'required|string|max:128',
            'original_location' => 'required|string|max:128',
            'current_location' => 'required|string|max:128',
            'question_one' => 'required|string|max:128',
            'question_two' => 'required|string|max:128',
            'question_three' => 'required|string|max:128',
            'question_four' => 'required|string|max:128',
            'course_id' => 'required',
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = $survey->photo;
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/surveys/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                unlink(public_path('images/surveys/').$survey->photo);
                $temporaryFile->delete();
            }    
        }

        $survey->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'primary_phone_number' => $request->primary_phone_number,
            'whatsapp_number' => $request->whatsapp_number,
            'id_card_number' => $request->id_card_number,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'bio' => $request->bio,
            'currency_id' => $request->currency_id,
            'marital_status' => $request->marital_status,
            'date_of_birth' => $request->date_of_birth,
            'branch_id' => $request->branch_id,
            'email' => $request->email,
            'photo' => $photo,
            'mosque_name' => $request->mosque_name,
            'description' => $request->description,
            'original_location' => $request->original_location,
            'current_location' => $request->current_location,
            'question_one' => $request->question_one,
            'question_two' => $request->question_two,
            'question_three' => $request->question_three,
            'question_four' => $request->question_four,
            'course_id' => $request->course_id,
            'status' => $request->status,
        ]);

        session()->flash('survey_updated', 'Survey updated successfully');
        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        foreach(UserGuarantee::where('survey_id', $survey->id)->get() as $item)
        {
            $item->delete();
            unlink(public_path('images/user_guarantees/').$item->photo);
        }

        $survey->delete();
        unlink(public_path('images/surveys/').$survey->photo);
        session()->flash('survey_deleted', 'Survey deleted successfully.');
    }
}
