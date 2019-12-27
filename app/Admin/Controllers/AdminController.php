<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;


class AdminController extends Controller
{

    public function __construct(){
        //$this->adminUserInfo = Auth::guard('admin')->user();
        //Auth::guard('admin');
    }

    public function index(){

        return view('admin.index');
    }
}
