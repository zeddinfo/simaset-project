<?php

namespace App\Http\Controllers\Api\History;

use App\Http\Controllers\Controller;
use App\Models\History\LogHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogHistoryController extends Controller
{
    public function list(Request $request){
        $list = LogHistory::where(['id_asset' => $request->id])->get();

        return DataTables::of($list)
        ->addIndexColumn()
        ->editColumn( 'user',function($data){
            $user = $data->user->name;
            return $user;
        })
        ->make(true);
    }
}
