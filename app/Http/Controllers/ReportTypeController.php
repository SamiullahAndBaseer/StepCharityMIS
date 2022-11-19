<?php

namespace App\Http\Controllers;

use App\Models\ReportType;
use Illuminate\Http\Request;

class ReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report_types = ReportType::all();
        return view('admin.report_type.report_types_list', ['report_types'=> $report_types]);
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
            'name'=> 'required|max:255|unique:report_types,name',
            'description' => 'required',
        ]);
 
        $report_type = new ReportType();
        $report_type->name = $request->name;
        $report_type->description = $request->description;
        $report_type->save();
 
        session()->flash('message', 'Report type added successfully.');
        return response()->json([
            'status' => 'success',
        ]);
    }
    // update the report type
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|max:255',
            'description' => 'required',
        ]);
 
        $report_type = ReportType::find($id);
        $report_type->name = $request->name;
        $report_type->description = $request->description;
        $report_type->save();
 
        session()->flash('message', $report_type->name.' updated successfully!');
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
        $report_type = ReportType::find($id);
        $report_type->delete();

        session()->flash('message', 'Report type deleted successfully!');
        
        return response()->json([
            'status' => 'success',
        ]);
    }
}
