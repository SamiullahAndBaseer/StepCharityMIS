<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\Province;
use App\Models\Role;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->get();
        return view('admin.students.all_students', ['students'=> $students]);
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
        $role = Role::select('id','name')->where('id', 3)->first();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.students.add_student', ['branches'=> $branches, 'currencies'=> $currencies, 'provinces'=> $provinces, 'role'=> $role]);
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
        $role = Role::where('name', 'Student')->first();
        
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

        return redirect('student')->with('message', 'Student Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::findOrFail($id);
        $branches = Branch::select('name', 'id')->get();
        // $province = Province::pluck('name', 'id')->all();
        // $districts = District::pluck('name', 'id')->all();
        $currencies = Currency::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.students.edit_student' ,compact(['student','currencies','branches', 'provinces']));
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
        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $student = User::findOrFail($id);
        if($temporaryFile)
        {
            if($student->profile_photo_path == $temporaryFile->filename){
                unlink(public_path('tmp/'.$temporaryFile->folder).'/'.$temporaryFile->new_photo);
                rmdir(public_path('tmp/'.$temporaryFile->folder));
                $temporaryFile->delete();

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
            }else{
                $old_image = $student->profile_photo_path;
                $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->new_photo), public_path('images/'.$temporaryFile->new_photo));
                if($status){
                    unlink(public_path('images').'/'.$old_image);
                    $student->profile_photo_path = $temporaryFile->new_photo;
                    $student->save();
                    rmdir(public_path('tmp/'. $request->profile_photo));
                    $temporaryFile->delete();

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
                } 
            }

            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->father_name = $request->father_name;
            $student->email = $request->email;
            $student->phone_number = $request->phone_number;
            $student->id_card_number = $request->id_card_number;
            $student->salary = $request->salary;
            $student->bio = $request->bio;
            $student->password = Hash::make($request->password);
            $student->gender = $request->gender;
            $student->join_date = $request->join_date;
            $student->status = $request->status;
            $student->date_of_birth = $request->date_of_birth;
            $student->marital_status = $request->marital_status;
            $student->currency_id = $request->currency_id;
            $student->branch_id = $request->branch_id;
            $student->save();

            return redirect('student')->with('message', $student->first_name.' updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();
        unlink(public_path('images').'/'.$student->profile_photo_path);
        return redirect()->route('student.index')->with('message', 'Record deleted successfully');
    }
}
