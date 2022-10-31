<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\Province;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.dashboard');
        // $students = User::whereHas('role', function($q){
        //     $q->where('name', 'Student');
        // })->get();
        // return view('admin.students.all_students', ['students'=> $students]);
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
    public function store(UserRequest $request)
    {
        $data = $request->all();

        // dd($request->profile_photo_path);
        if ($request->hasFile('profile_photo_path')){
            $profile_photo_path = $request->file('profile_photo_path');
            $data['profile_photo_path'] = $data['phone_number']. '.' . $profile_photo_path->getClientOriginalExtension();
            Storage::putFileAs('public/', $profile_photo_path, $data['profile_photo_path']);
        }

        $data['password'] = bcrypt('password');

        User::create($data);

        session()->flash('message', 'Student Created Successfully!');

        return redirect()->route('all.student');
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
        //
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
        //
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
