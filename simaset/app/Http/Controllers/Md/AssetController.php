<?php

namespace App\Http\Controllers\Md;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(){
        $title = 'List Asset';
        return view('admin.md.asset.index', compact('title'));
    }
}
