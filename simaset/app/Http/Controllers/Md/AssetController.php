<?php

namespace App\Http\Controllers\Md;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Md\Asset;
use App\Models\Md\Dokumentasi;
use App\Models\Md\Penyewa;
use App\Models\Md\Perizinan;
use DB;
use Carbon\Carbon;


class AssetController extends Controller
{
    public function index(){
        $title = 'Master Data Asset';
        return view('admin.md.asset.index', compact('title'));
    }
    public function create(Request $request){
        $model = new Asset();
 
        $title = 'Create Master Data Asset';
        
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model = new Asset();
                $model->namaasset = $request->namaasset;
                $model->alamat = $request->alamat;
                $model->lt = $request->lt;
                $model->lb = $request->lb;
                $model->kamar = $request->kamar;
                $model->km = $request->km;
                $model->listrik = $request->listrik;
                $model->air = $request->air;
                $model->legal = $request->legalitas;
                $model->an_legal = $request->an_setipikat;
                $model->no_legal = $request->no_setipikat;
                $model->hadap = $request->menghadap;
                $model->status = $request->status;

                $model->save();

                if($request->perizinan){
                    $request->perizinan = json_decode(json_encode($request->perizinan));

                    foreach($request->perizinan as $r){
                        $perizinan = empty($r->id) ? new Perizinan() : Perizinann::find($r->id);
                        $perizinan->line_no = $r->line_no;
                        $perizinan->nomor = $r->nomor;
                        $perizinan->tanggal = date('Y-m-d', strtotime($request->tgl_izin));
                        $perizinan->id_asset = $model->id;
                        $perizinan->save();
                    }
                }

                if($request->dokumentasi){

                    foreach($request->dokumentasi as $r){
                        $file = $r['foto'];
                        $dokumentasi = empty($r['id']) ? new Dokumentasi() : Dokumentasi::find($r['id']);
                        $basePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
                        $fileName = $file->getClientOriginalName(); 
                        $path = $file->storeAs('public/file/foto', $fileName);
                        $dokumentasi->file_name = $fileName;
                        $dokumentasi->keterangan = $r['keterangan'];
                        $dokumentasi->id_asset = $model->id_asset;

                        $dokumentasi->save();
                    }
                }

                $penyewa = new Penyewa();
                $tgl = $request->tgl_sewa;
                $masa_akhir = Carbon::parse($tgl)->addYears($request->masa_sewa)->format('Y-m-d');
                $penyewa->nama_penyewa = $request->nama_penyewa;
                $penyewa->mulai_sewa = date('Y-m-d', strtotime($request->tgl_sewa));
                $penyewa->masa_sewa = $request->masa_sewa;
                $penyewa->selesai_sewa = $masa_akhir;
                $penyewa->harga_jual = $request->harga;
                $penyewa->satuan_harga = $request->satuan_harga;
                $penyewa->harga_sewa = $request->harga_sewa;
                $penyewa->satuan_sewa = $request->satuan_sewa;
                $penyewa->id_asset = $model->id;

                $penyewa->save();

                DB::commit();
                toastr()->success('Data Berhasil Disimpan');
                return redirect('md/asset/index');

            } catch (\Exception $e){
                toastr()->warning('Data gagal disimpan');
                DB::rollBack();
                return $e;
            }
        }

        return view('admin.md.asset.create', compact('title', 'model'));
    }
}
