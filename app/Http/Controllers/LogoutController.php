<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logoutUser(){
        if(Session::has("user")){

            Session::forget("user");
        }

        return "/";
    }
}
