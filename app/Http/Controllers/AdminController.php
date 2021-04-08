<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends OsnovniController
{
    public function index(){
        return view("pages.adminRelated.adminPanel");
    }
    public function adminBlogPanel(){
        return view("pages.adminRelated.adminBlogPanel");
    }
    public function adminUsers(){
        $this->data["users"]=User::where("role_id",2)->get();
        return view("pages.adminRelated.adminUsers",$this->data);
    }
    public function adminApprovedBlogs(){
        $this->data["approvedBlogs"]=Blog::with("images","user")->where("active",1)->get();
        return view("pages.adminRelated.adminApprovedBlogs",$this->data);
    }
    public function adminPendingBlogs(){
        $this->data["pendingBlogs"]=Blog::with("images","user")->where("active",0)->get();
        return view("pages.adminRelated.adminPendingBlogs",$this->data);
    }
    public function getAdminApprovedBlogs(){
        return Blog::with("images","user")->where("active",1)->get();
    }
    public function getAdminPendingBlogs(){
        return Blog::with("images","user")->where("active",0)->get();
    }
    public function approveBlog(Request $request){
        $blogApproveId = $request->input("blogApproveId");
        Blog::where("id",$blogApproveId)->update(["active"=>1]);

        return Blog::with("images","user")->where("active",0)->get();
    }
    public function deleteBlog(Request $request){
        $blogDeleteId = $request->input("blogDeleteId");
        Blog::where("id",$blogDeleteId)->delete();
        Image::where("blog_id",$blogDeleteId)->delete();

        $approved = Blog::with("images","user")->where("active",1)->get();
        $pending = Blog::with("images","user")->where("active",0)->get();
        return [$approved,$pending];
    }


}
