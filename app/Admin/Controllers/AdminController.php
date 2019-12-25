<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    protected $authAdmin = null;
    protected $adminUser = null;
    public function __construct(){
        $this->authAdmin = Auth::guard('admin');
        $this->adminUser = $this->authAdmin->user();
    }

    public function index()
    {
        dd(Auth::guard('admin')->user()->id);
        echo 'this is Admin/Controllers/AdminController.php 里面的index方法';
    }
}
