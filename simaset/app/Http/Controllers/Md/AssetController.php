<?php

namespace App\Http\Controllers\Md;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(){
        $title = 'Master Data Asset';
        return view('admin.md.asset.index', compact('title'));
    }
    public function create(Request $request){
        $title = 'Create Master Data Asset';
        return view('admin.md.asset.create', compact('title'));
    }
}
