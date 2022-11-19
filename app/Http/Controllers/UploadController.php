<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $file_ext = $file->getClientOriginalExtension();
            $filename = uniqid().now()->timestamp.'.'.$file_ext;
            $folder = uniqid() .'-'. now()->timestamp;

            $file->storeAs('tmp/'.$folder, $filename);
            
            DB::table('temporary_files')->insert([
                'folder' => $folder,
                'filename' => $filename,
            ]);

            return $folder;
        }

        return '';
    }

    // This is for update image upload
    public function updateImage(Request $request, $id)
    {
        if($request->hasFile('profile_photo'))
        {
            $user = User::findOrFail($id);
            $file = $request->file('profile_photo');
            $filename = $file->getClientOriginalName();

            if($user->profile_photo_path != $filename){
                $filename = uniqid().now()->timestamp.'.'.$file->getClientOriginalExtension();
                $folder = uniqid(). '-'. now()->timestamp;

                $file->storeAs('tmp/'.$folder, $filename);
            
                DB::table('temporary_files')->insert([
                    'folder' => $folder,
                    'filename' => $filename,
                ]);

                return $folder;
            }else{
                return '';
            }
        }

        return '';
    }

    public function deleteImage($id)
    {
        return $id;
    }

    // for maktob images
    public function maktobImages(Request $request)
    {   
        if($request->hasFile('images')){
            $file = $request->file('images');
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

    public function delete(Request $request)
    {
        if($request->hasFile('images')){
            return $request->file('images')->getClientOriginalName();
        }
        return 'null';
    }
}
