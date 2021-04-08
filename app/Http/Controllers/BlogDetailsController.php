<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogDetailsController extends OsnovniController
{
    public function index($id){
        $this->data["details"]=Blog::with("images","user")->find($id);
        return view("pages.blogDetails",$this->data);
    }
}
