<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\UserGuarantee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\File;

class UserGuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_guarantees = UserGuarantee::all();
        return view('admin.user_guarantee.guarantee_list', ['user_guarantees'=> $user_guarantees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $survey = Survey::select('id')->where('id', $id)->first();
        return view('admin.user_guarantee.add_guarantee', ['survey'=> $survey]);
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
            'first_name' => 'required|string|max:64', 
            'last_name' => 'required|string|max:64', 
            'father_name' => 'required|string|max:64',
            'gender' => 'required',
            'email' => 'required|email|unique:user_guarantees,email',
            'phone_number' => 'required',
            'whatsapp' => 'required',
            'id_card_number' => 'required|string',
            'date_of_birth' => 'required',
            'original_address' => 'required|string',
            'current_address' => 'required|string',
            'description' => 'required|string',
            'relation' => 'required|string',
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = '';
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/user_guarantees/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                $temporaryFile->delete();
            }    
        }else{
            $this->validate($request,[
                'profile_photo'=> 'required',
            ]);
        }
        
        UserGuarantee::create([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'father_name' => $request->father_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'whatsapp' => $request->whatsapp,
            'id_card_number' => $request->id_card_number,
            'DoB' => $request->date_of_birth,
            'original_address' => $request->original_address,
            'current_address' => $request->current_address,
            'photo' => $photo,
            'description' => $request->description, 
            'user_id' => Auth::user()->id, 
            'survey_id' => $request->survey_id, 
            'relation' => $request->relation,
        ]);

        session()->flash('guarantee', 'User guarantee added successfully.');
        return redirect()->route('guarantee.index');
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
        $user_guarantee = UserGuarantee::findOrFail($id);
        return view('admin.user_guarantee.edit_guarantee', ['user_guarantee'=> $user_guarantee]);
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
        $user_guarantee = UserGuarantee::findOrFail($request->id);
        $this->validate($request,[
            'first_name' => 'required|string|max:64', 
            'last_name' => 'required|string|max:64', 
            'father_name' => 'required|string|max:64',
            'gender' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'whatsapp' => 'required',
            'id_card_number' => 'required|string',
            'date_of_birth' => 'required',
            'original_address' => 'required|string',
            'current_address' => 'required|string',
            'description' => 'required|string',
            'relation' => 'required|string',
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = $user_guarantee->photo;
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/user_guarantees/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                unlink(public_path('images/user_guarantees/').$user_guarantee->photo);
                $temporaryFile->delete();
            }    
        }
        
        $user_guarantee->update([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'father_name' => $request->father_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'whatsapp' => $request->whatsapp,
            'id_card_number' => $request->id_card_number,
            'DoB' => $request->date_of_birth,
            'original_address' => $request->original_address,
            'current_address' => $request->current_address,
            'photo' => $photo,
            'description' => $request->description, 
            'user_id' => Auth::user()->id, 
            'survey_id' => $request->survey_id, 
            'relation' => $request->relation,
        ]);

        session()->flash('guarantee_updated', 'User guarantee updated successfully.');
        return redirect()->route('guarantee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_guarantee = UserGuarantee::findOrFail($id);
        $user_guarantee->delete();
        unlink(public_path('images/user_guarantees/').$user_guarantee->photo);
        session()->flash('guarantee_deleted', 'User guarantee deleted successfully.');
    }
}
