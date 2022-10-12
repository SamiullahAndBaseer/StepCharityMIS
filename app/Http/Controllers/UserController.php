<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Branch;
use App\Models\User;
use App\Models\Province;
use App\Models\Village;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Currency;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    private function getRequest(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('profile_photo_path')){
            $profile_photo_path = $request->file('profile_photo_path');
            $data['profile_photo_path'] = 'assets/img/'. $data['name'] . '.' . $profile_photo_path->getClientOriginalExtension();
            Storage::putFileAs('public/', $profile_photo_path, $data['image']);
        }

      
        return $data;
    }

    private $limit = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $users = User::select('id','first_name','last_name', 'phone_number', 'email', 'role_id', 'join_date', 'profile_photo_path')->get();
        return view('admin.users.employee_list', compact(['users']));
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
        $roles = Role::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.users.add_employee', compact(['branches','roles','currencies', 'provinces']));
    }

    public function getDistricts($id)
    {
       
        $districts = District::where('province_id', $id)->select('id', 'name')->get();

        return response()->json($districts);
    }

    public function getVillages($id)
    {
       
        $villages = Village::where('district_id', $id)->select('id', 'name')->get();

        return response()->json($villages);
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

        if ($request->hasFile('profile_photo_path')){
            $profile_photo_path = $request->file('profile_photo_path');
            $data['profile_photo_path'] = '/users/'. $data['first_name'] . '.' . $profile_photo_path->getClientOriginalExtension();
            Storage::putFileAs('public/', $profile_photo_path, $data['profile_photo_path']);
        }

        $data['password'] = bcrypt('password');

        $users = User::create($data);

        return redirect('user')->with('message', 'User Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $branches = Branch::select('name', 'id')->get();
        // $province = Province::pluck('name', 'id')->all();
        // $districts = District::pluck('name', 'id')->all();
        $roles = Role::select('name', 'id')->get();
        $currencies = Currency::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.users.employee_profile',compact(['user','currencies','roles','branches', 'provinces']));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $branches = Branch::select('name', 'id')->get();
        // $province = Province::pluck('name', 'id')->all();
        // $districts = District::pluck('name', 'id')->all();
        $roles = Role::select('name', 'id')->get();
        $currencies = Currency::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.users.edit_employee',compact(['user','currencies','roles','branches', 'provinces']));
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
        if(Auth::user()->id == $id){
            $request->validate([
            'first_name' => 'bail|required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'father_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email','.$id',
            'phone_number' => "required|string|min:9|max:13|unique:users,phone_numbers,except,${id}",
            'id_card_number' => 'required|string|max:13|unique:users,id_card_number','.$id',
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
            'role_id' => 'nullable|numeric',
        ]);
    }else{
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'father_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email','.$id',
            'phone_number' => 'required|string|min:9|max:13|unique:users,phone_number', '.$id',
            'id_card_number' => 'required|string|max:13|unique:users,id_card_number','.$id',
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
            'role_id' => 'nullable|numeric',
        ]);
    }

    $data = $this->getRequest($request);

    if(Auth::user()->id == $id){
        $data['password'] = bcrypt($request->password);
    }
    $user = User::findOrFail($id);
    $user->update($data);
    $user->save();
    return redirect('user')->with('message', 'User Updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data->delete();
        return redirect()->route('user')->with('success', 'Record deleted successfully');
    }

    public function searchUsers(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $role = $request->input('role');

        // $users = User::orWhere('role_id', 'Like', "%{$role}%")->orWhere('first_name', 'Like', "%{$name}%")->orWhere('last_name', 'Like',"%{$name}%")->orWhere('phone_number', 'Like', "%{$phone}%")->get();

        $users = User::where('first_name', 'LIKE', "%{$name}%")
        ->orWhere('last_name', 'LIKE', "%{$name}%")
        ->orWhere('role_id', 'LIKE', "%{$role}%")
        ->orWhere('phone_number', 'LIKE', "%{$phone}%")

        ->get();
        return view('admin.users.employee_list', compact([ 'users']));


    }
}
