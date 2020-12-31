<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Md\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function getAll(){
        $list = Asset::where('is_delete', 0)->with('dokumentasi', 'perizinan')->get();
        $data = base64_encode($list);

        return response()->json([
            'status' => '200 OK',
            'message' => 'Get Asset Successfull',
            'data' => $data,
        ]);
    }

    public function getById(Request $request){
        $list = Asset::query()->where(['id' => $request->id])->with('dokumentasi', 'perizinan')->first();
        $data = base64_encode($list);

        if(!$list){
            return response()->json([
                'status' => '404',
                'message' => 'Data Tidak Ditemukan',
            ]);
        }

        return response()->json([
            'status' => '200 OK',
            'message' => 'Get Asset Successfull',
            'data' => $data,
        ]);
    }
}
