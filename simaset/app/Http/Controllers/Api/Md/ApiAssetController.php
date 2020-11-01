<?php

namespace App\Http\Controllers\Api\Md;

use App\Http\Controllers\Controller;
use App\Models\Md\Asset;
use Illuminate\Http\Request;
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

    public function list(Request $request){
        $list = Asset::where('is_delete', 0)->get();

        return DataTables::of($list)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $button = '<a href="'.url("md/asset/update/".$data->id).'" title = "Edit" data-id="'.$data->id.'" class="btn btn-primary btn-xs"> <i class="fa fa-book"></i></a>';

            $button .= '&nbsp';

            $button .= '<button type="button" title="Hapus" data-id="'.$data->id.'" onclick="hapus('.$data->id.')" class="btn btn-warning btn-xs"> 
                            <i class="fas fa-fw fa-trash"></i>
                        </button>';

            $button .= '&nbsp';

            $button .= '<a href="'.url("md/asset/detail/".$data->id).'" title = "Detail" data-id="'.$data->id.'" class="btn btn-info btn-xs"> <i class="fa fa-search"></i></a>';

            $button .= '&nbsp';

            $button .= '<a href="'.url("md/asset/export-pdf/".$data->id).'" title = "Export PDF" data-id="'.$data->id.'" class="btn btn-danger btn-xs"> <i class="fas fa-file-pdf danger"></i></a>';

            return $button;
        })
        ->editColumn('image', function($data){
            $param = count($data->dokumentasi);
            if($param != 0){
                $path = $data->dokumentasi[0]->file_name;
                $image = url('/storage/file/foto/'.$path);
            } else {
                $image = url('/storage/file/foto/no-photos.png');
            }
            return $image;
            // dd($image);
        })
        ->editColumn('harga', function($data){
            if($data->status == 'MAINTENANCE'){
                $harga = ' - ';
            } else if($data->status == 'DIJUAL / DISEWAKAN') {
                $harga = 'Rp'. $data->harga_jual. '' .$data->satuan_jual. ' - ';
                $harga .= 'Rp'. $data->harga_sewa. '' .$data->satuan_sewa;
            } else if($data->status == 'DIJUAL') {
                $harga = 'Rp'. $data->harga_jual. '' .$data->satuan_jual;
            } else if($data->status == 'DISEWAKAN') {
                $harga = 'Rp'. $data->harga_sewa. '' .$data->satuan_sewa;
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
}
