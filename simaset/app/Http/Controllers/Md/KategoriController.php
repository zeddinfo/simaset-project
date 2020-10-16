<?php

namespace App\Http\Controllers\Md;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $title = 'Master Data Kategori';
        return view('admin.md.kategori.index', compact('title'));
    }
}
