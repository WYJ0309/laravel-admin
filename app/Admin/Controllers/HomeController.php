<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        echo 'this is Admin/Controllers/HomeController.php 里面的index方法';
        die;
    }
    public function test(){
        echo 2;die;
    }
}
