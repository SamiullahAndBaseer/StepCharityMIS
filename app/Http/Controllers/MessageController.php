<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use UltraMsg\WhatsAppApi;

class MessageController extends Controller
{
    public function sendWhatsappMsg(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required',
            'message' => 'required',
            'attachment' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $ultramsg_token="lrga9kmn9xaqnrzb"; // Ultramsg.com token
            $instance_id="instance21327"; // Ultramsg.com instance id
            $client = new WhatsAppApi($ultramsg_token, $instance_id);
            $to= $request->number;
            $body= $request->message; 
            $api=$client->sendChatMessage($to, $body);

            if($api){
                return response()->json(['code'=> 1, 'msg'=> 'Message sent.']);
            }
        }
    }
}
