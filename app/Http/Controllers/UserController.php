<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Role;
use App\Models\Branch;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Currency;
use App\Models\Leave;
use App\Models\StudentAttendance;
use App\Models\TemporaryFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // it shows all users.
    public function index(Request $request)
    {   
        $users = User::whereHas('role', function($q){
            $q->where('name', 'Employee')->OrWhere('name', 'Director');
        })->get();
        return view('admin.users.employee_list', compact(['users']));
    }

    // Show the create page
    public function create()
    {
        $branches = Branch::select('name', 'id')->get();
        $currencies = Currency::select('name', 'id')->get();
        $roles = Role::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();

        return view('admin.users.add_employee', compact(['branches','roles','currencies', 'provinces', 'districts']));
    }

    public function getDistricts(Request $request)
    {
        $value = $request->get('value');
        $data = District::where('province_id', $value)->select('id', 'name')->get();
        $output = '<option value="">Select District</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return response()->json($output);
    }

    // Store new user in database.
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'father_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|min:9|max:13|unique:users,phone_number',
            'id_card_number' => 'required|string|max:14|unique:users,id_card_number',
            'salary' => 'required|numeric|min:0|max:20000',
            'bio' => 'required|string|min:3|max:500',
            'password' => 'required|string|min:6',
            'gender' => 'required|numeric|min:0|max:1',
            'join_date' => 'required|date',
            'status' => 'required|min:0|max:1',
            'date_of_birth' => 'required|date',
            'marital_status' => 'nullable|numeric|min:0|max:1',
            'currency_id' => 'required|numeric',
            'branch_id' => 'required|numeric',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required'
        ],[
            'currency_id' => 'The currency field is required.',
            'branch_id' => 'The branch field is required.'
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = '';
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                $temporaryFile->delete();
            }    
        }else{
            $this->validate($request,[
                'profile_photo' => 'required'
            ],['profile_photo'=> 'The profile photo is required.']);
        }

        $role = Role::where('name', 'Employee')->first();
        
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'id_card_number' => $request->id_card_number,
            'salary' => $request->salary,
            'bio' => $request->bio,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status,
            'join_date' => $request->join_date,
            'role_id' => $role->id,
            'branch_id' => $request->branch_id,
            'currency_id' => $request->currency_id,
            'email' => $request->email,
            'profile_photo_path' => $photo,
            'password' => Hash::make($request->password),
            'district_id' => $request->district,
            'address' => $request->address
        ]);

        return redirect('user')->with('message', 'User Created Successfully!');
    }

    // Store new user in database.
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'father_name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|string|min:9|max:13',
            'id_card_number' => 'required|string|max:13',
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
            'province' => 'required',
            'district' => 'required',
            'address' => 'required'
        ]);

        $temporaryFile = TemporaryFiles::where('folder', $request->profile_photo)->first();
        $photo = $user->profile_photo_path;
        if($temporaryFile)
        {
            $status = File::move(public_path('tmp/'. $request->profile_photo .'/'.$temporaryFile->filename),
            public_path('images/'.$temporaryFile->filename));
            if($status){
                $photo = $temporaryFile->filename;
                rmdir(public_path('tmp/'. $request->profile_photo));
                unlink(public_path('images/').$user->profile_photo_path);
                $temporaryFile->delete();
            }    
        }
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->father_name = $request->father_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->id_card_number = $request->id_card_number;
        $user->salary = $request->salary;
        $user->bio = $request->bio;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->join_date = $request->join_date;
        $user->status = $request->status;
        $user->date_of_birth = $request->date_of_birth;
        $user->marital_status = $request->marital_status;
        $user->currency_id = $request->currency_id;
        $user->branch_id = $request->branch_id;
        $user->profile_photo_path = $photo;
        $user->district_id = $request->district;
        $user->address = $request->address;
        $user->save();

        return redirect('user')->with('message', $user->first_name.' updated Successfully!');
    }

    // Show user for edit.
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $branches = Branch::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();
        $currencies = Currency::select('name', 'id')->get();
        $provinces = Province::select('id', 'name')->get();

        return view('admin.users.edit_employee' ,compact(['user','currencies','branches', 'provinces', 'districts']));
    }

    // For delete the single user.
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        unlink(public_path('images').'/'.$user->profile_photo_path);
        return redirect()->route('user.index')->with('message', 'Record deleted successfully');
    }

    // user profile
    public function singleUser($id)
    {
        $user = User::findOrFail($id);

        if($user->role->name === 'Student'){
            $present_per_month = StudentAttendance::where('user_id', $user->id)
                    ->where('present', true)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
            
            $absent_per_month = StudentAttendance::where('user_id', $user->id)
                    ->where('present', false)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
                    
        }else{
            $present_per_month = Attendance::where('user_id', $user->id)
                    ->where('present', true)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
            
            $absent_per_month = Attendance::where('user_id', $user->id)
                    ->where('present', false)
                    ->whereMonth('created_at', Carbon::now()->month)->count();
        }

        $leave_per_month = Leave::where('user_id', $user->id)
                    ->where('status', 'approved')
                    ->whereMonth('created_at', Carbon::now()->month)->count();

        return view('admin.users.employee_profile', [
            'user'=> $user, 
            'present_per_month'=> $present_per_month,
            'absent_per_month'=> $absent_per_month,
            'leave_per_month' => $leave_per_month,
        ]);
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
