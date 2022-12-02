<?php

namespace App\Http\Controllers;

use App\Mail\SendUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required|max:120'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $details = [
                'title' => $request->title,
                'body' => $request->message
            ];
    
            Mail::to($request->to)->send(new SendUserMail($details));

            return response()->json(['code'=> 1, 'msg'=> 'Email sent successfully.']);
        }
    }
}
