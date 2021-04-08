<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends OsnovniController
{
    public function index(){
        return view("pages.login",$this->data);
    }
    public function loginUser(Request $request){
        $emailLog = $request->input("email");
        $passLog = $request->input("pass");

        $validate = $request->validate([
            'email' => 'regex:/^[a-zšđčćž,\.-_\d.!?]+@[a-z]+(.[a-z]+){1,2}$/',
            'pass' => "regex:/^.{4,10}$/"
        ]);
        if($validate){
            $getUser = User::where("email",$emailLog)->get();
            if($getUser){
                $checkPass = Hash::check($passLog,$getUser[0]->password);
                if($checkPass){
                    Session::put("user",$getUser);
                    foreach ($getUser as $user){
                        if($user->role_id==1){
                            return "/adminPanel";
                        }
                        else{
                            return "/userPanel";
                        }
                    }

                }
            }
        }
    }
}
