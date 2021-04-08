<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class UserController extends OsnovniController
{
    public function index(){
        return view("pages.userRelated.userPanel",$this->data);
    }
    public function userCreateBlog(){
        return view("pages.userRelated.userCreateBlog",$this->data);
    }
    public function userUpdateBlog(){
        return view("pages.userRelated.userUpdateBlog",$this->data);
    }
    public function userDeleteBlog(){
        return view("pages.userRelated.userDeleteBlog",$this->data);
    }
    public function getUserBlogs(){
        $userId = Session::get("user")[0]->id;
        return Blog::with("images","user")->where("user_id",$userId)->orderBy("active")->get();
    }
    public function createBlog(Request $request){
        $titleCreate = $request->input("titleCreate");
        $pictureCreate = $request->file("pictureCreate");
        $textCreate = $request->input("descCreate");
        $userIdCreate = Session::get("user")[0]->id;

        $extension='';

        if($pictureCreate != null){

            $extension = $request->file("pictureCreate")->extension();
            $newPictureName = date("Y-m-d")."-".Str::random(10).".".$extension;
            $pictureCreate->move(public_path('assets/images/'),$newPictureName);

        }

        $lastId = Blog::create([

            "title"=>$titleCreate,
            "text"=>$textCreate,
            "user_id"=>$userIdCreate,
            "active"=>0

        ]);

        Image::create([

            "src"=>$newPictureName,
            "blog_id"=>$lastId->id

        ]);
//        return view("pages.userRelated.userPanel",$this->data);
        return redirect('/userPanel');
    }

    public function updateBlog($id){
        $this->data["updateBlogUser"]=Blog::with("images","user")->find($id);
        return view("pages.UserRelated.userUpdateBlog",$this->data);
    }

    public function updateBlogUser(Request $request){
        $idUpdate = $request->input("blogIdUser");
        $titleUpdate = $request->input("titleUpdate");
        $textUpdate = $request->input("descUpdate");
        $pictureUpdate = $request->file("pictureUpdate");

        if($pictureUpdate != null){

            $extensionUpdate = $request->file("pictureUpdate")->extension();
            $newPictureNameUpdate = date("Y-m-d")."-".Str::random(10).".".$extensionUpdate;
            $pictureUpdate->move(public_path('assets/images'),$newPictureNameUpdate);

            Image::where("blog_id",$idUpdate)->update([
                "src"=>$newPictureNameUpdate
            ]);

            Blog::where("id",$idUpdate)->update([
                "title"=>$titleUpdate,
                "text"=>$textUpdate,
            ]);
        }
        else{
            Blog::where("id",$idUpdate)->update([
                "title"=>$titleUpdate,
                "text"=>$textUpdate,
            ]);
        }
//        return view("pages.UserRelated.userPanel",$this->data);
        return redirect('/userPanel');
    }

    public function deleteBlog(Request $request){
        $deleteBlogId = $request->input("deleteBlogId");
        Blog::where("id",$deleteBlogId)->delete();
        Image::where("blog_id",$deleteBlogId)->delete();

        $userId = Session::get("user")[0]->id;
        return Blog::with("images","user")->where("user_id",$userId)->orderBy("active")->get();

    }
}
