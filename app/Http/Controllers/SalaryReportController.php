<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Leave;
use App\Models\SalaryReport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary_reports = SalaryReport::all();
        return view('admin.salary_report.salary_reports', ['salary_reports'=> $salary_reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.salary_report.add_salary_payment',[
            'users' => $users
        ]);
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
            'user_id' => 'required',
            'tip' => 'numeric|nullable',
            'description' => 'required|max:100'
        ],['user_id'=> 'The username is required.']);

        $user = User::findOrFail($request->user_id);
        
        $present_per_month = Attendance::where('user_id', $user->id)
                ->where('present', true)
                ->whereMonth('created_at', Carbon::now()->month)->count();

        $leave_per_month = Leave::where('user_id', $user->id)
                ->where('status', 'approved')
                ->whereMonth('created_at', Carbon::now()->month)->count();

        $salary = $user->salary * ($present_per_month + $leave_per_month);

        SalaryReport::create([
            'user_id' => $user->id,
            'salary' => $salary,
            'present_days' => $present_per_month,
            'leave_days' => $leave_per_month,
            'tip' => $request->tip,
            'description' => $request->description,
            'payer_id' => auth()->user()->id,
        ]);

        session()->flash('salary_payment', 'Salary payment added successfully');
        return redirect()->route('salary-report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = SalaryReport::findOrFail($id);

        return view('admin.salary_report.print_payment', ['payment'=> $payment]);
    }

    public function paidSalary($id)
    {
        $salary = SalaryReport::findOrFail($id);
        $salary->status = 'Paid';
        $salary->payer_id = Auth::user()->id;
        $salary->save();

        return response()->json(['code'=> 1 , 'msg'=> 'Salary paid successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = SalaryReport::findOrFail($id)->delete();
        if($payment)
        {
            session()->flash('payment_deleted', 'Salary payment deleted successfully');
        }else{
            session()->flash('payment_deleted', 'Salary payment not deleted');
        }
    }
}
