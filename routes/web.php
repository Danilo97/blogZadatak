<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BlogDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use \App\Http\Middleware\AdminMiddleware;
use \App\Http\Middleware\UserMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/",[IndexController::class,"index"])->name("index");
Route::get("/details/{id}",[BlogDetailsController::class,"index"])->name("details");

Route::get("/login",[LoginController::class,"index"])->name("login");
Route::post("/loginUser",[LoginController::class,"loginUser"])->name("loginUser");

Route::get("/register",[RegisterController::class,"index"])->name("register");
Route::post("/registerUser",[RegisterController::class,"registerUser"])->name("registerUser");

Route::get("/logout",[LogoutController::class,"logoutUser"])->name("logout");

Route::middleware([AdminMiddleware::class])->group(function () {
    //Admin Routes
    Route::get("/adminPanel",[AdminController::class,"index"])->name("adminPanel");
    Route::get("/adminBlogPanel",[AdminController::class,"adminBlogPanel"])->name("adminBlogPanel");
    Route::get("/adminUsers",[AdminController::class,"adminUsers"])->name("adminUsers");
    Route::get("/adminApprovedBlogs",[AdminController::class,"adminApprovedBlogs"])->name("adminApprovedBlogs");
    Route::get("/adminPendingBlogs",[AdminController::class,"adminPendingBlogs"])->name("adminPendingBlogs");
    Route::get("/getAdminApprovedBlogs",[AdminController::class,"getAdminApprovedBlogs"]);
    Route::get("/getAdminPendingBlogs",[AdminController::class,"getAdminPendingBlogs"]);

//Approve Blog Admin
    Route::post("/approveBlog",[AdminController::class,"approveBlog"]);
//Delete Blog Admin
    Route::post("/deleteBlog",[AdminController::class,"deleteBlog"]);
});

Route::middleware([UserMiddleware::class])->group(function () {
    //User Routes
    Route::get("/userPanel",[UserController::class,"index"])->name("userPanel");
    Route::get("/userCreateBlog",[UserController::class,"userCreateBlog"])->name("userCreateBlog");
    Route::get("/userUpdateBlog",[UserController::class,"userUpdateBlog"])->name("userUpdateBlog");
    Route::post("/userDeleteBlog",[UserController::class,"userDeleteBlog"])->name("userDeleteBlog");
    Route::get("/getUserBlogs",[UserController::class,"getUserBlogs"]);
    Route::post("/createBlog",[UserController::class,"createBlog"])->name("createBlog");
    Route::get("/updateBlog/{id}",[UserController::class,"updateBlog"]);
    Route::post("/updateBlogUser",[UserController::class,"updateBlogUser"])->name("updateBlogUser");
    Route::get("/getUserPanel",[UserController::class,"getUserPanel"])->name("getUserPanel");
    Route::post("/deleteUserBlog",[UserController::class,"deleteBlog"]);
});



