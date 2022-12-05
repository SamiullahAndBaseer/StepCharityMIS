<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Support\Facades\Auth;

class TeacherContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::where('user_id', Auth::user()->id)->get();
        return view('teacher.contract.all_contracts', ['contracts'=> $contracts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return view('teacher.contract.show_contract', ['contract'=> $contract]);
    }

}
