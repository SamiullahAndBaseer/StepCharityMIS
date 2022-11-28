<?php

namespace App\Http\Controllers;

use App\Models\ProposalForItem;
use Illuminate\Http\Request;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\File;

class RequestForItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(RequestForItemController::sessionDestroy() == null){
            $request_items = ProposalForItem::all();
            return view('proposal_for_item.requested_items_list', ['request_items'=> $request_items]);   
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposal_for_item.send_request_for_item');
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
            'title' => 'required', 
            'description' => 'required|max:100',
        ]);

        $temporaryFolder = session()->get('folder');
        $imageName = session()->get('filename');
        
        
        $tmp = TemporaryFiles::where('folder', $temporaryFolder)->where('filename', $imageName)->first();

        if($tmp){
            $imageName = $tmp->filename;
            $status = File::move(public_path('tmp/'. $tmp->folder.'/'.$tmp->filename), public_path('files/request_items/'.$tmp->filename));
            if($status){
                rmdir(public_path('tmp/'.$tmp->folder));
                $tmp->delete();
            }
        }

        ProposalForItem::create([
            'title' => $request->title, 
            'description' => $request->description,
            'verify_by_main_branch_director' => false, 
            'verify_by_main_branch_admin' => false, 
            'verify_by_general_office_finance' => false,
            'verify_by_general_office_director' => false, 
            'upload_file' => $imageName, 
            'user_id' => auth()->user()->id
        ]);

        session()->flash('request_item', 'Request for item sent successfully');
        RequestForItemController::sessionDestroy();
        return redirect()->route('request-item.index');
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
        $item = ProposalForItem::findOrFail($id);
        return view('proposal_for_item.edit_request_item', ['item'=> $item]);
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
            'title' => 'required', 
            'description' => 'required|max:100',
        ]);

        $item = ProposalForItem::findOrFail($request->id);
        $item_image = $item->upload_file;

        $temporaryFolder = session()->get('folder');
        $imageName = session()->get('filename');
        
        
        $tmp = TemporaryFiles::where('folder', $temporaryFolder)->where('filename', $imageName)->first();

        if($tmp){
            $item_image = $tmp->filename;
            $status = File::move(public_path('tmp/'. $tmp->folder.'/'.$tmp->filename), public_path('files/request_items/'.$tmp->filename));
            if($status){
                rmdir(public_path('tmp/'.$tmp->folder));
                unlink(public_path('files/request_items/').$item->upload_file);
                $tmp->delete();
            }
        }

        $item->update([
            'title' => $request->title, 
            'description' => $request->description,
            'upload_file' => $item_image, 
            'user_id' => auth()->user()->id
        ]);

        session()->flash('request_item', 'Request for item updated successfully');
        RequestForItemController::sessionDestroy();
        return redirect()->route('request-item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProposalForItem::findOrFail($id);
        unlink(public_path('files/request_items/').$item->upload_file);
        $item->delete();
        
        if($item){
            session()->flash('request_item', 'Request for item deleted successfully');
        }else{
            session()->flash('request_item', 'Request for item not deleted.');
        }
    }
}
