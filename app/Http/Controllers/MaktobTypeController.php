<?php

namespace App\Http\Controllers;

use App\Models\MaktobType;
use Illuminate\Http\Request;

class MaktobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maktob_types = MaktobType::all();
        return view('admin.maktob_types.maktob_types', ['maktob_types'=> $maktob_types]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:255|unique:maktob_types,name',
            'description' => 'required',
        ]);
 
        $maktob_type = new MaktobType();
        $maktob_type->name = $request->name;
        $maktob_type->description = $request->description;
        $maktob_type->save();
 
        session()->flash('message', 'Maktob type Created Successfully!');
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
            'name'=> 'required|max:255',
            'description' => 'required',
        ]);
 
        $maktob_type = MaktobType::findOrFail($request->id);
        $maktob_type->name = $request->name;
        $maktob_type->description = $request->description;
        $maktob_type->save();
 
        session()->flash('message', $maktob_type->name.' updated successfully!');
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
    public function destroy(Request $request)
    {
        $maktob_type = MaktobType::find($request->id);
       $maktob_type->delete();

       session()->flash('message', 'Maktob type deleted successfully!');
       
       return response()->json([
           'status' => 'success',
       ]);
        
    }
}
