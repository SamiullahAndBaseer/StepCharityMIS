<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.list_branch', ['branches'=> $branches]);
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
            'branch_name'=> 'required|max:255|unique:branches,name',
            'branch_description' => 'required',
        ]);

        $branch = new Branch();
        $branch->name = $request->branch_name;
        $branch->description = $request->branch_description;
        $branch->save();

        session()->flash('message', 'Branch created successfully!');
        return response()->json([
            'status' => 'success',
        ]);
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
        $this->validate($request, [
            'branch_name'=> 'required|max:255',
            'branch_description' => 'required',
        ]);

        $branch = Branch::find($request->branch_id);
        $branch->name = $request->branch_name;
        $branch->description = $request->branch_description;
        $branch->save();

        session()->flash('message', $branch->name.' updated successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $branch = Branch::findOrFail($request->id);
        $branch->delete();
        session()->flash('message', 'Branch deleted successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }
}
