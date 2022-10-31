<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceSettings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $attends = Attendance::all()->where('created_at', Carbon::today());
        return view("admin.users.user_attendance", ['attends'=> $attends]);
    }

    public function storeAttendance(Request $request)
    {
        $result = explode(',', $request->qrCodeResult);
        $user_id = $result[0];
        $user_name = User::find($user_id);

        $time= Carbon::now(); // Current Time
        $attend_time = AttendanceSettings::find(1);

        if($time->isBefore($attend_time->start_attendance_PM))
        {
            // For Morning Attendance
            if(Carbon::parse($time)->betweenIncluded($attend_time->start_attendance_AM, $attend_time->end_attendance_AM)){
                // echo $time ." is between ". $attend_time->start_attendance_AM." and ". $attend_time->end_attendance_AM;
                $attend = Attendance::where('user_id', $user_id)
                ->whereDate('created_at', Carbon::today())
                ->exists();

                // User already is present today.
                if($attend){
                    session()->flash('message', $user_name->first_name.' '.$user_name->last_name.' already present.');
                    return response()->json([
                        'status'=> 'user_exist',
                    ]);

                }else{ // User present now.
                    $attendance = new Attendance();
                    $attendance->user_id = $user_id;
                    $attendance->time_in = Carbon::now()->toTimeString();
                    $attendance->present = true;
                    $attendance->attendance_getter_id = Auth::user()->id;
                    $attendance->save();

                    return response()->json([
                        'status' => 'success',
                        'first_name' => $user_name->first_name,
                        'last_name' => $user_name->last_name,   
                    ]);
                }
            }else{
                // echo $time ." is not between ". $attend_time->start_attendance_AM." and ". $attend_time->end_attendance_AM;
                return response()->json([
                    'status' => 'time_out_AM',
                ]);
            }
        }else{
            // For Afternoon Attendance
            if(Carbon::parse($time)->betweenIncluded($attend_time->start_attendance_PM, $attend_time->end_attendance_PM))
            {
                $attend = Attendance::where('user_id', $user_id)
                        ->whereDate('updated_at', Carbon::now()->toDateTime())
                        ->where('time_out', null)
                        ->exists();

                if($attend){
                    // One time present Afternoon
                    $attendance = Attendance::where('user_id', $user_id)->where('time_out', null)->first();
                    $attendance->time_out = Carbon::now()->toTimeString();
                    $attendance->save();

                    return response()->json([
                        'status' => 'success',
                    ]);

                }else{
                    return response()->json([
                        'status' => 'afternoon'
                    ]);
                }
            }else{

                return response()->json([
                    'status' => 'time_out_PM',
                ]);
            }
        }
    }

    // Attendance Settings
    public function setting()
    {
        $setting = AttendanceSettings::find(1);
        return view('admin.attendance_settings', ['setting'=> $setting]);
    }

    public function updateSetting(Request $request)
    {
        // $attend_setting = new AttendanceSettings();
        $attend_setting = AttendanceSettings::find(1);
        $attend_setting->start_attendance_AM = $request->start_am;
        $attend_setting->end_attendance_AM = $request->end_am;
        $attend_setting->start_attendance_PM = $request->start_pm;
        $attend_setting->end_attendance_PM = $request->end_pm;
        $attend_setting->save();

        return back()->with('status', 'Attendance settings updated successfully.');
    }
}
