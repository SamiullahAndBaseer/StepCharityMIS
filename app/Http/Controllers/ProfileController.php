<?php

namespace App\Http\Controllers;

use App\Models\EducationInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:100',
            'last_name'=> 'required|max:100',
            'phone_number' => ['required', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $user = User::findOrFail(auth()->user()->id);

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
            $user->email = $request->email;
            $user->phone_number =$request->phone_number;
            $user->profile_photo_path = $photo;
            $user->save();
            return response()->json(['code'=> 1, 'msg'=> 'Profile information updated successfully.']);
        }
        // 'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
    }

    // add education
    public function addEducation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'institution'=> 'required|max:100',
            'subject'=> 'required|max:100',
            'starting_date' => 'required',
            'complete_date' => 'required',
            'degree' => 'required',
            'grade' => 'required|string',
            'additional' => 'nullable|string|max:100'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            EducationInfo::create([
                'institution' => $request->institution,
                'subject' => $request->subject,
                'starting_date' => $request->starting_date,
                'complete_date' => $request->complete_date,
                'degree' => $request->degree,
                'grade' => $request->grade,
                'additional' => $request->additional,
                'user_id' => Auth::user()->id,
            ]);

            return response()->json(['code'=> 1, 'msg'=> 'Education information added successfully.']);
        }
    }

    // delete eduation
    public function destroy($id)
    {
        EducationInfo::findOrFail($id)->delete();
        return response()->json([
            'status'=> 'success'
        ]);
    }

    // change password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            if(Hash::check($request->current_password, Auth::user()->password))
            {
                $user = User::findOrFail(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();

                return response()->json(['code'=> 1, 'msg'=> 'Password has been changed successfully.']);
            }
        }
    }

    // for logout from other browser
    public function logoutOtherBrowser(StatefulGuard $guard, Request $request)
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        if (! Hash::check($request->password, Auth::user()->password)) {
            return response()->json(['code'=>  0, 'error'=> 'This password does not match our records.']);
        }

        $guard->logoutOtherDevices($request->password);
        
        $this->deleteOtherSessionRecords();

        request()->session()->put([
            'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
        ]);

        return response()->json(['code'=> 1, 'msg'=> 'Logout from other browsers successfully.']);
    }

    protected function deleteOtherSessionRecords()
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }

}
