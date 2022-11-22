<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.list_role', ['roles'=> $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role_name'=> 'required|max:255|unique:roles,name',
            'role_description' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->role_name;
        $role->description = $request->role_description;
        $role->save();

        session()->flash('message', 'Role created successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }

    // if role edit all user denied.
    // public function update(Request $request)
    // {
    //     $this->validate($request, [
    //         'role_name'=> 'required|max:255',
    //         'role_description' => 'required',
    //     ]);

    //     $role = role::find($request->role_id);
    //     $role->name = $request->role_name;
    //     $role->description = $request->role_description;
    //     $role->save();

    //     session()->flash('message', $role->name.' updated successfully!');
    //     return response()->json([
    //         'status' => 'success',
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        session()->flash('message', 'Role deleted successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }
}
