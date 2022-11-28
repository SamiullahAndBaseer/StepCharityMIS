<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\ProposalForItem;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\File;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::all();
        return view('qoutation.quotations_list', ['quotations'=> $quotations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proposals = ProposalForItem::all();
        $currencies = Currency::all();
        return view('qoutation.add_quotation', ['proposals'=> $proposals, 'currencies'=> $currencies]);
    }

    // quotation bill image
    public function billImage(Request $request)
    {
        if($request->hasFile('bill_image')){
            $file = $request->file('bill_image');
            $file_ext = $file->getClientOriginalExtension();
            $filename = uniqid().now()->timestamp.'.'.$file_ext;
            $folder = uniqid(). '-'. now()->timestamp;

            $file->storeAs('tmp/'.$folder, $filename);

            TemporaryFiles::create([
                'folder'=> $folder,
                'filename' => $filename
            ]);

            session()->push('folder', $folder); //save session folder
            // $folder = ($item1, $item2, $item3)
            session()->push('filename', $filename); //save session filename

            return $folder;
        }
        return '';
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
            'name' => 'required',
            'price' => 'required|numeric',
            'quality' => 'required',
            'discount' => 'nullable|numeric',
            'currency_id' => 'required',
            'proposal_id' => 'required',
        ]);

        $temporaryFolder = session()->get('folder');
        $imageName = session()->get('filename');
        
        $tmp = TemporaryFiles::where('folder', $temporaryFolder)->where('filename', $imageName)->first();

        if($tmp){
            $imageName = $tmp->filename;
            $status = File::move(public_path('tmp/'. $tmp->folder.'/'.$tmp->filename), public_path('files/quotations/'.$tmp->filename));
            if($status){
                rmdir(public_path('tmp/'.$tmp->folder));
                $tmp->delete();
            }
        }else{
            $this->validate($request,[
                'bill_image'=> 'required'
            ]);
        }

        Quotation::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'quality'=> $request->quality,
            'bill_image'=> $imageName,
            'discount'=> $request->discount,
            'status_for_buying'=> 'Waiting',
            'general_office_status'=> false,
            'financial_status_afg'=> false,
            'currency_id'=> $request->currency_id,
            'proposal_id'=> $request->proposal_id
        ]);

        session()->flash('quotation', 'Quotation has been added successfully');
        QuotationController::sessionDestroy();
        return redirect()->route('quotation.index');
    }

    // for removing the session
    public static function sessionDestroy()
    {
        if(session()->has('folder') || session()->has('filename')){
            $result = session()->remove('folder');
            $result2 = session()->remove('filename');
            return $result;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        $proposals = ProposalForItem::all();
        $currencies = Currency::all();
        return view('qoutation.edit_quotation', ['quotation'=> $quotation, 'proposals'=> $proposals, 'currencies'=> $currencies]);
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
            'name' => 'required',
            'price' => 'required|numeric',
            'quality' => 'required',
            'discount' => 'nullable|numeric',
            'currency_id' => 'required',
            'proposal_id' => 'required',
        ]);

        $quotation = Quotation::findOrFail($request->id);
        $bill_image = $quotation->bill_image;

        $temporaryFolder = session()->get('folder');
        $imageName = session()->get('filename');
        
        $tmp = TemporaryFiles::where('folder', $temporaryFolder)->where('filename', $imageName)->first();

        if($tmp){
            $bill_image = $tmp->filename;
            $status = File::move(public_path('tmp/'. $tmp->folder.'/'.$tmp->filename), public_path('files/quotations/'.$tmp->filename));
            if($status){
                rmdir(public_path('tmp/'.$tmp->folder));
                unlink(public_path('files/quotations/').$quotation->bill_image);
                $tmp->delete();
            }
        }

        $quotation->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'quality'=> $request->quality,
            'bill_image'=> $bill_image,
            'discount'=> $request->discount,
            'currency_id'=> $request->currency_id,
            'proposal_id'=> $request->proposal_id
        ]);

        session()->flash('quotation', 'Quotation has been updated successfully');
        QuotationController::sessionDestroy();
        return redirect()->route('quotation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Quotation::findOrFail($id);
        unlink(public_path('files/quotations/').$item->bill_image);
        $item->delete();
        
        if($item){
            session()->flash('quotation', 'Quotation deleted successfully');
        }else{
            session()->flash('quotation', 'Quotation not deleted.');
        }
    }
}
