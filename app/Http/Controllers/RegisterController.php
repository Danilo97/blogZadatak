<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends OsnovniController
{
    public function index(){
        return view("pages.register",$this->data);
    }

    public function registerUser(Request $request){
        if($request->input("button")){

            $name = $request->input("name");
            $lastName = $request->input("lastName");
            $emailReg = $request->input("emailReg");
            $passReg = $request->input("passReg");
            $passHash = Hash::make($passReg);

            $emailUnique = User::where("email",$emailReg)->get();
            if(count($emailUnique)!=0){
                return "This email is taken!";
            }
            $validate = $request->validate([

                'name' => 'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,20}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,20})?$/',
                'lastName' => 'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,20}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,20})?$/',
                'email' => 'regex:/^[a-zšđčćž,\.-_\d.!?]+@[a-z]+(\.[a-z]+){1,2}$/',
                'password' => 'regex:/^.{4,10}$/',
            ]);

            if($validate){
                User::create([

                    "firstName"=>$name,
                    "lastName"=>$lastName,
                    "email"=>$emailReg,
                    "password"=>$passHash,
                    "role_id"=>2
                ]);
                return "/login";
            }

        }



    }
}
