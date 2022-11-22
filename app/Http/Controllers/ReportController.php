<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('admin.report.reports_list', ['reports'=> $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report_types = ReportType::all();
        $users = User::all();
        return view('admin.report.add_report', ['report_types'=> $report_types, 'users'=> $users]);
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
            'description'=> 'required',
            'receiver'=> 'required',
            'report_type_id'=> 'required'
        ],[
            'report_type_id'=> 'The report type field is required.',
        ]);

        Report::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'receiver'=> $request->receiver,
            'report_type_id'=> $request->report_type_id,
            'user_id'=> Auth::user()->id
        ]);

        session()->flash('report', 'Report create successfully');
        return redirect()->route('report.index');
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
        $report = Report::findOrFail($id);
        $report_types = ReportType::all();
        $users = User::all();
        return view('admin.report.edit_report', ['report_types'=> $report_types, 'users'=> $users, 'report'=> $report]);
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
            'description'=> 'required',
            'receiver'=> 'required',
            'report_type_id'=> 'required'
        ],[
            'report_type_id'=> 'The report type field is required.',
        ]);

        Report::findOrFail($id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'receiver'=> $request->receiver,
            'report_type_id'=> $request->report_type_id,
            'user_id'=> Auth::user()->id
        ]);

        session()->flash('report', 'Report updated successfully');
        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Report::findOrFail($id)->delete();
        session()->flash('report_deleted', 'Report deleted successfully');
        return redirect()->route('report.index');
    }
}
