<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends OsnovniController
{
    public function index(){
        $this->data["blogs"]=Blog::with("images","user")->where("active",1)->get();
        return view("pages.index",$this->data);
    }
}
