<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard Administrator';
        return view('admin.dashboard.index', compact('title'));
    }
}
