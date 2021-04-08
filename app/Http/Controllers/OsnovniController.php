<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class OsnovniController extends Controller
{
    protected $data;

    public function __construct(){
        $this->data['menus']=Menu::all();
    }
}
