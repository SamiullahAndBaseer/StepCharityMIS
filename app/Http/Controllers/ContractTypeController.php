<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract_types = ContractType::all();
        return view('admin.contract_type.list_contract_types', ['contract_types'=> $contract_types]);
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
            'name'=> 'required|max:255|unique:contract_types,name',
            'description' => 'required',
        ]);
 
        $contract_type = new ContractType();
        $contract_type->name = $request->name;
        $contract_type->description = $request->description;
        $contract_type->save();
 
        session()->flash('message', 'Contract type created successfully!');
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|max:255',
            'description' => 'required',
        ]);
 
        $contract_type = ContractType::findOrFail($id);
        $contract_type->name = $request->name;
        $contract_type->description = $request->description;
        $contract_type->save();
 
        session()->flash('message', $contract_type->name.' updated successfully!');
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
    public function destroy($id)
    {
        $contract_type = ContractType::findOrFail($id);
        $contract_type->delete();
        
        $contracts = Contract::where('contract_type_id', $contract_type->id)->get();
        foreach($contracts as $contract){
            $contract->delete();
        }

        session()->flash('message', 'Contract type deleted successfully!');
        return response()->json([
            'status' => 'success',
        ]);
    }
}
