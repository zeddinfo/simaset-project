<?php

namespace App\Http\Controllers\Api\Md;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DataTables;

class KategoriController extends Controller
{
    public function list(Request $request){
        $list = Category::all();
        
        return DataTables::of($list)
        ->addColumn('action', function($data){
            $button = '<button type="button" title="Edit" data-id="'.$data->id.'" onclick="edit('.$data->id.')" class="btn btn-warning btn-xs"> 
                <i class="fas fa-fw fa-book"></i> Edit
             </button>';
            $button .= '&nbsp&nbsp';
            $button .= '<button type="button" title="Hapus" data-id="'.$data->id.'" id="btn-edit" onclick="hapus('.$data->id.')" class="btn btn-danger btn-xs"> 
                <i class="fas fa-fw fa-trash"></i> Hapus
            </button>';

            return $button;
        })
        ->make(true);
    }
}
