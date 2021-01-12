<?php

namespace App\Http\Controllers\Api\Md;

use App\Http\Controllers\Controller;
use App\Models\Md\Asset;
use App\Models\History\LogHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ApiAssetController extends Controller
{
    public function asset(Request $request){
        $list = Asset::where('is_delete', 0)->with('dokumentasi', 'perizinan')->get();

        return response()->json([
            'status' => '200 OK',
            'message' => 'Get Asset Successfull',
            'data' => $list,
        ]);

    }



    // public function log(Request $request){
    //     $list = LogHistory;

    //     return response()->json([
    //         'status' => '200 OK',
    //         'message' => 'Get Asset Successfull',
    //         'data' => $list,
    //     ]);

    // }

    public function listLog(Request $request){
        $id = $request->id;
        
        $list = LogHistory::where('id_asset', $id)
        ->with('asset')
        ->orderby('id', 'DESC')
        ->get();

        return DataTables::of($list)
        ->editColumn('asset',function($data){
            return $data->asset->namaasset;
        })
        ->make(true);
        // else if($data->status == 'DIJUAL') {
        //     $harga = 'Rp '. $data->harga_jual. '' .$data->satuan_jual;
        
    }

    public function list(Request $request){
        $type = $request->type;
        if($type == 'sewa'){
            $list = Asset::where([
                ['is_delete', 0],
                ['status', 'DISEWAKAN']
                ])
            ->orderby('id', 'desc')
            ->get();
        } else if($type == 'jual'){
            $list = Asset::where([
                ['is_delete', 0],
                ['status', 'DIJUAL']
                ])
            ->orderby('id', 'desc')
            ->get();
        } else if($type == 'jual-sewa'){
            $list = Asset::where([
                ['is_delete', 0],
                ['status', 'DIJUALatauDISEWA']
                ])
            ->orderby('id', 'desc')
            ->get();
        } else if($type == 'maintenance'){
            $list = Asset::where([
                ['is_delete', 0],
                ['status', 'MAINTENANCE']
                ])
            ->orderby('id', 'desc')
            ->get();
        } else {
            $list = Asset::where('is_delete', 0)
            ->orderby('id', 'desc')
            ->get();
        }
     
        $user = $request->session()->get('role');
        return DataTables::of($list)
        ->addIndexColumn()
        ->addColumn('action', function($data) use ($user){
            $button = '';
            if($user == 'admin'){
                $button .= '<a href="'.url("md/asset/update/".$data->id).'" title = "Edit" data-id="'.$data->id.'" class="btn btn-primary btn-xs"> <i class="fas fa-edit"></i></a>';

                $button .= '&nbsp';
    
                $button .= '<button type="button" title="Hapus" data-id="'.$data->id.'" onclick="hapus('.$data->id.')" class="btn btn-warning btn-xs"> 
                                <i class="fas fa-fw fa-trash"></i>
                            </button>';
    
                $button .= '&nbsp';
            } else if($user == 'operasional'){
                $button = '';
                $button .= '<a href="'.url("md/asset/update/".$data->id).'" title = "Edit" data-id="'.$data->id.'" class="btn btn-primary btn-xs"> <i class="fas fa-edit"></i></a>';

                $button .= '&nbsp';
            }

            $button .= '<a href="'.url("md/asset/detail/".$data->id).'" title = "Detail" data-id="'.$data->id.'" class="btn btn-info btn-xs"> <i class="fa fa-search"></i></a>';

            $button .= '&nbsp';

            $button .= '<a href="'.url("md/asset/export-pdf/".$data->id).'" title = "Export PDF" data-id="'.$data->id.'" class="btn btn-danger btn-xs"> <i class="fas fa-file-pdf danger"></i></a>';

            return $button;
        })
        ->editColumn('image', function($data){
            $param = count($data->dokumentasi);
            if($param != 0){
                $img = $data->dokumentasi[0]->file_name;
                $url = 'http://localhost/sim/sim/simaset/simaset-project/simaset/'.$data->dokumentasi[0]->url;
                $image = url($url);
            } else {
                $image = url('/storage/file/foto/no-photos.png');
            }
            return $image;
            // dd($image);
        })
        ->editColumn('harga', function($data){
            if($data->status == 'MAINTENANCE'){
                $harga = ' - ';
            } else if($data->status == 'DIJUALatauDISEWA') {
                $harga = $data->harga_jual. '' .$data->satuan_jual. ' - ';
                $harga .= $data->harga_sewa. '' .$data->satuan_sewa;
            } else if($data->status == 'DIJUAL') {
                $harga = $data->harga_jual. '' .$data->satuan_jual;
            } else if($data->status == 'DISEWAKAN') {
                $harga = $data->harga_sewa. '' .$data->satuan_sewa;
            } else {
                $harga = '0';
            }
            return $harga;
        })
        ->editColumn('ukuran', function($data){
            $uk = $data->lebar * $data->panjang;
            return $uk;
        })
        ->make(true);
    }
    public function chart(){
        $data = DB::select("SELECT status, COUNT(status) as total FROM asset GROUP BY(status)");

        return response()->json($data);
    }


}
