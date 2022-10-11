<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function checkAuth()
    {
        if(Auth::user()->role_id == 1){
            return redirect('/admin/dashboard');
        }elseif(Auth::user()->role_id == 2){
            return redirect('/user/dashboard');
        }
    }
}
