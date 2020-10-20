<?php

namespace App\Http\Controllers\Md;

use App\Helpers\UtilCompressImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Md\Asset;
use App\Models\Md\Dokumentasi;
use App\Models\Md\Penyewa;
use App\Models\Md\Perizinan;
use DB;
use Carbon\Carbon;
use Storage;


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
                        $file = $r['file'];
                        $basePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
 
                        // dd($file);
                        $dokumentasi = empty($r['id']) ? new Dokumentasi() : Dokumentasi::find($r['id']);
                        $fileName = $file->getClientOriginalName();
                        $path = $file->storeAs('public/file/foto', $fileName);
                        $filetemp =  $basePath . 'public/file/foto\\' . $fileName;
                        $fileDest = $basePath . 'public/file/foto\\' . date('Y-m-d-H-i-s') . $fileName;
                        $realPath = 'public/file/foto\\' . date('Y-m-d-H-i-s') . $fileName;
                        UtilCompressImage::compressImage($filetemp, $fileDest, 75);
                         /*Remove file Original*/
                         unlink($filetemp);
                        $dokumentasi->pathfoto = $path;
                        $dokumentasi->file_name = $fileName;
                        $dokumentasi->keterangan = $r['keterangan'];
                        $dokumentasi->id_asset = $model->id;

                        $dokumentasi->save();
                    }
                }

                $penyewa = new Penyewa();
                $tgl = Carbon::createFromFormat('d/m/Y',$request->tgl_sewa)->format('d-m-Y');
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
    
    public function update(Request $request){
        $model = Asset::query()->where(['id' => $request->id])->with('penyewa')->first();
        $title = 'Update Asset '.$model->namaasset;
        
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model = Asset::find($request->id);
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
                $model->harga = $request->harga;
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
                        $file = $r['file'];
                        $basePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
 
                        // dd($file);
                        $dokumentasi = empty($r['id']) ? new Dokumentasi() : Dokumentasi::find($r['id']);
                        $fileName = $file->getClientOriginalName();
                        $path = $file->storeAs('public/file/foto', $fileName);
                        $filetemp =  $basePath . 'public/file/foto\\' . $fileName;
                        $fileDest = $basePath . 'public/file/foto\\' . date('Y-m-d-H-i-s') . $fileName;
                        $realPath = 'public/file/foto\\' . date('Y-m-d-H-i-s') . $fileName;
                        UtilCompressImage::compressImage($filetemp, $fileDest, 75);
                         /*Remove file Original*/
                         unlink($filetemp);
                        $dokumentasi->pathfoto = $path;
                        $dokumentasi->file_name = $fileName;
                        $dokumentasi->keterangan = $r['keterangan'];
                        $dokumentasi->id_asset = $model->id;

                        $dokumentasi->save();
                    }
                }

                $penyewa = new Penyewa();
                $tgl = Carbon::createFromFormat('d/m/Y',$request->tgl_sewa)->format('d-m-Y');
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

    public function delete($id){
        $model = Asset::where(['id' => $id])->first();

        if (empty($model)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $model->delete();
            DB::rollBack();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $this->msg_delete_error_foreign_constraint], 409);
        }
        $model = Asset::where(['id' => $id])->first();

        $model->is_delete = '1';
        $model->update();
        DB::commit();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
