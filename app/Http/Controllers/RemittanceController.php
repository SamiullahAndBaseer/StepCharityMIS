<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Remittance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RemittanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remittances = Remittance::orderBy('created_at', 'DESC')->get();
        return view('remittance.remittance_list', ['remittances'=> $remittances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::all();
        $users = User::whereHas('role', function($q){
            $q->whereNot('name', 'Student');
        })->get();

        return view('remittance.send_remittance', ['currencies'=> $currencies, 'users'=> $users]);
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
            'remittance_number' => 'required|string', 
            'amount' => 'required|numeric',
            'currency_id' => 'required', 
            'receiver_id' => 'required',
        ],[
            'currency_id'=> 'The currency for amount is required',
            'receiver_id'=> 'The receiver name is required'
        ]);

        Remittance::create([
            'date_of_remittance' => Carbon::now(),
            'remittance_number' => $request->remittance_number, 
            'amount' => $request->amount,
            'status' => "Sent",
            'currency_id' => $request->currency_id, 
            'receiver_id' => $request->receiver_id, 
            'sender_id' => auth()->user()->id,
        ]);

        session()->flash('remittance_send', 'Remittance sent successfully');
        return redirect()->route('remittance.index');
    }

    // For received remittance
    public function onReceived(Request $request)
    {
        $remittance = Remittance::findOrFail($request->id);
        $remittance->status = 'Received';
        $remittance->date_of_receive = Carbon::now();
        $remittance->save();

        session()->flash('remittance_received', 'Remittance received successfully');
        return response()->json([
            'status'=> 'success',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remittance = Remittance::findOrFail($id);
        $currencies = Currency::all();
        $users = User::whereHas('role', function($q){
            $q->whereNot('name', 'Student');
        })->get();

        return view('remittance.edit_remittance', ['remittance'=> $remittance, 'users'=> $users, 'currencies'=> $currencies]);
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
            'remittance_number' => 'required|string', 
            'amount' => 'required|numeric',
            'currency_id' => 'required', 
            'receiver_id' => 'required',
        ],[
            'currency_id'=> 'The currency for amount is required',
            'receiver_id'=> 'The receiver name is required'
        ]);

        Remittance::findOrFail($request->id)->update([
            'remittance_number' => $request->remittance_number, 
            'amount' => $request->amount,
            'currency_id' => $request->currency_id, 
            'receiver_id' => $request->receiver_id, 
            'sender_id' => auth()->user()->id,
        ]);

        session()->flash('remittance_edit', 'Remittance updated successfully');
        return redirect()->route('remittance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remittance = Remittance::findOrFail($id)->delete();

        if($remittance)
        {
            session()->flash('remittance_deleted', 'Remittance deleted successfully');
        }else{
            session()->flash('remittance_deleted', 'Remittance not deleted.');
        }
    }
}
