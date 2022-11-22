<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Student_course;
use App\Models\User;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificate.certificate_list', ['certificates'=> $certificates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        // $users = Student_course::orderBy('created_at', 'DESC')->get();
        $users = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->select('id', 'first_name', 'last_name')->get();
        
        return view('admin.certificate.add_certificate', ['courses'=> $courses, 'users'=> $users]);
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
            'certificate_type'=> 'required',
            'course_id' => 'required',
            'user_id' => 'required',
            'description' => 'required',
        ],[
            'course_id'=> 'The course field is required',
            'user_id' => 'The username field is required'
        ]);

        Certificate::create([
            'certificate_type'=> $request->certificate_type,
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'description' => $request->description,
        ]);

        session()->flash('certificate', 'Certificate added!');
        return redirect()->route('certificate.index');
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
        $certificate = Certificate::findOrFail($id);
        $courses = Course::orderBy('created_at', 'DESC')->get();
        $users = User::whereHas('role', function($q){
            $q->where('name', 'Student');
        })->select('id', 'first_name', 'last_name')->get();

        return view("admin.certificate.edit_certificate", [
            'certificate'=> $certificate,
            'courses' => $courses,
            'users' => $users]);
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
            'certificate_type'=> 'required',
            'course_id' => 'required',
            'user_id' => 'required',
            'description' => 'required',
        ],[
            'course_id'=> 'The course field is required',
            'user_id' => 'The username field is required'
        ]);

        Certificate::findOrFail($id)->update([
            'certificate_type'=> $request->certificate_type,
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'description' => $request->description,
        ]);

        session()->flash('certificate', 'Certificate updated!');
        return redirect()->route('certificate.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Certificate::findOrFail($id)->delete();
        session()->flash('certificate', 'Certificate Deleted');
    }
}
