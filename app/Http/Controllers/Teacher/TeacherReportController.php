<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;

class TeacherReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::where('receiver', Auth::user()->first_name.' '.Auth::user()->last_name)->get();
        return view('teacher.report.reports_list', ['reports'=> $reports]);
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
        return view('teacher.report.add_report', ['report_types'=> $report_types, 'users'=> $users]);
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
            'title'=> 'required|string|max:100',
            'description'=> 'required|string|max:250',
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

        session()->flash('report', 'Report sent successfully');
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
        $report = Report::findOrFail($id);
        return view('teacher.report.show_report', ['report'=> $report]);
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
        return response()->json([
            'status' => 'done'
        ]);
    }
}
