<?php

namespace App\Http\Controllers;

use App\Models\Maktob;
use App\Models\MaktobType;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MaktobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(MaktobController::sessionDestroy() == null){
            $maktobs = Maktob::all();
            return view('admin.maktobs.maktobs', ['maktobs'=> $maktobs]);   
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maktob_types = MaktobType::all();
        return view('admin.maktobs.add_maktob', ['maktob_types'=> $maktob_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // MaktobController::sessionDestroy();
        $this->validate($request, [
            'title'=> 'required|string',
            'description'=> 'required',
            'status' => 'required',
            'reference_to' => 'required',
            'maktob_type_id' => 'required',
        ],[
            'maktob_type_id'=> 'The maktob type field required.'
        ]);

        $temporaryFolder = session()->get('folder');
        $imageName = session()->get('filename');
        
        $images_names = '';
        for($i=0; $i < count($temporaryFolder); $i++)
        {
            $tmp = TemporaryFiles::where('folder', $temporaryFolder[$i])->where('filename',
            $imageName[$i])->first();

            $images_names = $images_names.','.$tmp->filename;
            $status = File::move(public_path('tmp/'. $tmp->folder.'/'.$tmp->filename), public_path('files/maktobs/'.$tmp->filename));
            if($status){
                rmdir(public_path('tmp/'.$tmp->folder));
                $tmp->delete();
            }
        }

        Maktob::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'status'=> $request->status,
            'reference_to' => $request->reference_to,
            'images'=> $images_names,
            'maktob_type_id'=> $request->maktob_type_id,
        ]);

        session()->flash('maktob', 'Maktob added successfully');
        MaktobController::sessionDestroy();
        return redirect()->route('maktob.index');
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
        $maktob = Maktob::findOrFail($id);
        $maktob_types = MaktobType::all();
        return view('admin.maktobs.edit_maktob', ['maktob'=> $maktob, 'maktob_types'=> $maktob_types]);
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
        // MaktobController::sessionDestroy();
        $maktob = Maktob::findOrFail($id);

        $temporaryFolder = session()->get('folder');
        $imageName = session()->get('filename');
        
        $images_names = $maktob->images;
        if($temporaryFolder || $imageName){
            for($i=0; $i < count($temporaryFolder); $i++)
            {
                $tmp = TemporaryFiles::where('folder', $temporaryFolder[$i])->where('filename',
                $imageName[$i])->first();

                $images_names = $images_names.','.$tmp->filename;
                $status = File::move(public_path('tmp/'. $tmp->folder.'/'.$tmp->filename), public_path('files/maktobs/'.$tmp->filename));
                if($status){
                    rmdir(public_path('tmp/'.$tmp->folder));
                    $tmp->delete();
                }
            }
        }

        $this->validate($request, [
            'title'=> 'required|string',
            'description'=> 'required',
            'status' => 'required',
            'reference_to' => 'required',
            'maktob_type_id' => 'required',
        ],[
            'maktob_type_id'=> 'The maktob type field required.'
        ]);

        $maktob->title = $request->title;
        $maktob->description = $request->description;
        $maktob->reference_to = $request->reference_to;
        $maktob->status = $request->status;
        $maktob->maktob_type_id = $request->maktob_type_id;
        $maktob->images = $images_names;
        $maktob->save();

        session()->flash('maktob', 'Maktob updated successfully');
        MaktobController::sessionDestroy();
        return redirect()->route('maktob.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maktob = Maktob::findOrFail($id);
        $maktob->delete();
        $images = explode(',', $maktob->images);
        
        foreach($images as $img){
            if($img){
                unlink(public_path('files/maktobs/').$img);
            }
        }
        session()->flash('maktob', 'Maktob deleted successfully.');
    }
}
