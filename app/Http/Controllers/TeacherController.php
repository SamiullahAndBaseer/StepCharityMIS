<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use App\Models\Branch;
use App\Models\Role;
use App\Models\Province;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::whereHas('role', function($q){
            $q->where('name', 'Teacher');
        })->get();
        
        return view('admin.teachers.all_teachers', ['teachers'=> $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::select('name', 'id')->get();
        $currencies = Currency::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.teachers.add_teacher', compact(['branches','currencies', 'provinces']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'father_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|min:9|max:13|unique:users,phone_number',
            'id_card_number' => 'required|string|max:13|unique:users,id_card_number',
            'salary' => 'required|string|min:0', "max:200000",
            'bio' => 'required|string|min:3|max:500',
            'password' => 'required|string|min:6',
            'gender' => 'required|numeric|min:0|max:1',
            'join_date' => 'nullable|date',
            'status' => 'required|min:0|max:1',
            'date_of_birth' => 'nullable|date',
            'marital_status' => 'nullable|numeric|min:0|max:1',
            'currency_id' => 'nullable|numeric',
            'branch_id' => 'nullable|numeric',
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = '';
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                $temporaryFile->delete();
            }    
        }
        $role = Role::where('name', 'Teacher')->first();
        
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'id_card_number' => $request->id_card_number,
            'salary' => $request->salary,
            'bio' => $request->bio,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status,
            'join_date' => $request->join_date,
            'role_id' => $role->id,
            'branch_id' => $request->branch_id,
            'currency_id' => $request->currency_id,
            'email' => $request->email,
            'profile_photo_path' => $photo,
            'password' => Hash::make($request->password),
        ]);

        return redirect('teacher')->with('message', 'Teacher Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        $branches = Branch::select('name', 'id')->get();
        // $province = Province::pluck('name', 'id')->all();
        // $districts = District::pluck('name', 'id')->all();
        $currencies = Currency::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.teachers.edit_teacher' ,compact(['teacher','currencies','branches', 'provinces']));
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
        $teacher = User::findOrFail($id);
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'father_name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|string|min:9|max:13',
            'id_card_number' => 'required|string|max:13',
            'salary' => 'required|string|min:0', "max:200000",
            'bio' => 'required|string|min:3|max:500',
            'password' => 'required|string|min:6',
            'gender' => 'required|numeric|min:0|max:1',
            'join_date' => 'nullable|date',
            'status' => 'required|min:0|max:1',
            'date_of_birth' => 'nullable|date',
            'marital_status' => 'nullable|numeric|min:0|max:1',
            'currency_id' => 'nullable|numeric',
            'branch_id' => 'nullable|numeric',
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = $teacher->profile_photo_path;
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                unlink(public_path('images/').$teacher->profile_photo_path);
                $temporaryFile->delete();
            }    
        }
        
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->father_name = $request->father_name;
        $teacher->email = $request->email;
        $teacher->phone_number = $request->phone_number;
        $teacher->id_card_number = $request->id_card_number;
        $teacher->salary = $request->salary;
        $teacher->bio = $request->bio;
        $teacher->password = Hash::make($request->password);
        $teacher->gender = $request->gender;
        $teacher->join_date = $request->join_date;
        $teacher->status = $request->status;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->marital_status = $request->marital_status;
        $teacher->currency_id = $request->currency_id;
        $teacher->branch_id = $request->branch_id;
        $teacher->profile_photo_path = $photo;
        $teacher->save();

        return redirect('teacher')->with('message', $teacher->first_name.' updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();
        unlink(public_path('images').'/'.$teacher->profile_photo_path);
        return redirect()->route('teacher.index')->with('message', 'Record deleted successfully');
    }
}
