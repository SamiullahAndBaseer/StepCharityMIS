<?php

namespace App\Http\Controllers;

use App\Models\Leave_type;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
   // all leave_types
   public function index()
   {
        $leave_types = Leave_type::all();
        return view('admin.leave_types.leave_types', ['leave_types'=> $leave_types]);
   }

   // add new leave_type
   public function store(Request $request)
   {
       $this->validate($request, [
           'name'=> 'required|max:255|unique:leave_types,name',
           'description' => 'required',
       ]);

       $leave_type = new Leave_type();
       $leave_type->name = $request->name;
       $leave_type->description = $request->description;
       $leave_type->save();

       session()->flash('message', 'Leave type Created Successfully!');
       return response()->json([
           'status' => 'success',
       ]);
   }

   // update leave_type
   public function update(Request $request)
   {
       $this->validate($request, [
           'name'=> 'required|max:255',
           'description' => 'required',
       ]);

       $leave_type = Leave_type::find($request->id);
       $leave_type->name = $request->name;
       $leave_type->description = $request->description;
       $leave_type->save();

       session()->flash('message', $leave_type->name.' updated successfully!');
       return response()->json([
           'status' => 'success',
       ]);
   }

   // delete the leave_type
   public function destroy(Request $request)
   {
       $leave_type = Leave_type::find($request->id);
       $leave_type->delete();

       session()->flash('message', 'Leave type deleted successfully!');
       
       return response()->json([
           'status' => 'success',
       ]);
   }
}
