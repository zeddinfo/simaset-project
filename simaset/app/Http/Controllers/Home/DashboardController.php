<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends BaseController
{
    public function index(){
        $title = 'Dashboard Administrator';
        return view('admin.dashboard.index', compact('title'));
    }
}
