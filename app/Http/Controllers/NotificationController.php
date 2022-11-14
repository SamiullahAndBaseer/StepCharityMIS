<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function destroy(Request $req)
    {
        $admin_notification = DatabaseNotification::findOrFail($req->id);
        $admin_notification->delete();
        
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function markAsRead(){
        auth()->user()->unreadNotifications->markAsRead();
    }
}
