<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractType;
use App\Models\User;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('admin.contract.all_contracts', ['contracts'=> $contracts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contract_types = ContractType::all();
        $users = User::select('id', 'first_name', 'last_name')->get();
        return view('admin.contract.add_contract', ['contract_types'=> $contract_types, 'users'=> $users]);
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
            'description'=> 'required',
            'user_id' => 'required',
            'contract_type'=> 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Contract::create([
            'description'=> $request->description,
            'user_id' => $request->user_id,
            'contract_type_id'=> $request->contract_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        session()->flash('contract', 'Contract added successfully');
        return redirect()->route('contract.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $contract_types = ContractType::all();
        $users = User::select('id', 'first_name', 'last_name')->get();
        return view('admin.contract.edit_contract', ['contract'=> $contract, 'contract_types'=> $contract_types,
                'users'=> $users]);
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
        $this->validate($request, [
            'description'=> 'required',
            'user_id' => 'required',
            'contract_type'=> 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Contract::findOrFail($id)->update([
            'description'=> $request->description,
            'user_id' => $request->user_id,
            'contract_type_id'=> $request->contract_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        session()->flash('contract', 'Contract updated successfully');
        return redirect()->route('contract.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contract::findOrFail($id)->delete();
        session()->flash('contract', 'Contract deleted successfully');
    }
}
