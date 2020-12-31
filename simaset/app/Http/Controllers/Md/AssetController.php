<?php

namespace App\Http\Controllers\Md;

use App\Helpers\UtilCompressImage;
use App\Helpers\UtilUploadFoto;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\History\LogHistory;
use Illuminate\Http\Request;
use App\Models\Md\Asset;
use App\Models\Md\Dokumentasi;
use App\Models\Md\Penyewa;
use App\Models\Md\Perizinan;
use DB;
use Carbon\Carbon;
use Storage;
use PDF;


class AssetController extends BaseController
{
    public function index(Request $request){
        $user = $request->session()->get('role');
        
        $title = 'Master Data Asset';
        $create = '<a href="{{url("/md/asset/create")}}" class="btn btn-info active float-left" role="button"
        > <i class="fa fa-plus"></i> Tambah Data</a>';
        $workflow = $user == 'admin' ? $create : '';
        return view('admin.md.asset.index', compact('title', 'workflow'));
    }
    public function create(Request $request){
        $model = new Asset();
        $title = 'Create Master Data Asset';
        $model->tgl_sewa = '';
        $model->perizinan->tgl_izin = '';
        
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model = new Asset();
                $tgl = Carbon::createFromFormat('d/m/Y',$request->tgl_sewa)->format('d-m-Y');
                $model->namaasset = $request->namaasset;
                $model->alamat = $request->alamat;
                $model->lt = $request->lt;
                $model->lb = $request->lb;
                $model->kamar = $request->kamar;
                $model->km = $request->km;
                $model->listrik = $request->listrik;
                $model->panjang = $request->panjang;
                $model->hadap = $request->hadap;
                $model->namapenyewa = $request->nama_penyewa;
                $model->harga_jual = $request->harga_jual;
                $model->harga_sewa = $request->harga_sewa;
                $model->satuan_jual = $request->satuan_jual;
                $model->satuan_sewa = $request->satuan_sewa;
                // $model->jual = $request->harga;
                $model->hargaa = $request->hargaa;
                $model->harga_jual = $request->harga_jual;
                $model->tgl_sewa = $request->tgl_sewa;
                $model->masa_sewa = $request->masa_sewa;
                $masa_akhir = Carbon::parse($tgl)->addYears($request->masa_sewa)->format('Y-m-d');
                $model->masa_akhir = $masa_akhir;
                $model->lebar = $request->lebar;
                $model->air = $request->air;
                $model->legal = $request->legalitas;
                $model->an_legal = $request->an_setipikat;
                $model->no_legal = $request->no_setipikat;
                $model->hadap = $request->manghadap;
                $model->status = $request->status;
                $model->embed_google = $request->embed_google;
                $model->is_delete = '0';

                $model->save();

                if($request->perizinan){
                    $request->perizinan = json_decode(json_encode($request->perizinan));

                    foreach($request->perizinan as $r){
                        $perizinan = empty($r->id) ? new Perizinan() : Perizinan::find($r->id);
                        $perizinan->line_no = $r->line_no;
                        $perizinan->nomor = $r->nomor;
                        $perizinan->perizinan = $r->legalitas;
                        $perizinan->tgl_izin = date('Y-m-d', strtotime($r->tgl_izin));
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
                        $fileName = str_replace(' ','_',$file->getClientOriginalName());
                        $fileNameDB = date('Y-m-d-H-i-s') . $fileName;
                        $path = $file->storeAs('public/file/foto/big', $fileName);
                        
                        $upload =  UtilUploadFoto::UploadFoto($file, $basePath, 75);
                        // UtilCompressImage::compressImage($filetemp, $fileDest, 75);
                         /*Remove file Original*/
                         $dokumentasi->line_no = $r['line_no'];
                         $dokumentasi->pathfoto = $upload['path'];
                         $dokumentasi->url = $upload['url'];
                         $dokumentasi->file_name = $fileNameDB;
                         $dokumentasi->keterangan = $r['keterangan'];
                         $dokumentasi->id_asset = $model->id;

                        $dokumentasi->save();
                    }
                }

                $log = new LogHistory();
                $log->id_user = $request->session()->get('id');
                $log->status = 'CREATED ASSET';
                $log->id_asset = $model->id;
                $log->save();

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
        $model = Asset::query()->where(['id' => $request->id])->first();
        // dd($model->dokumentasi);
        $title = 'Update Asset '.$model->namaasset;
        
        if($request->isMethod('post')){
           
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model = Asset::find($request->id);
                $tgl = Carbon::createFromFormat('d/m/Y',$request->tgl_sewa)->format('d-m-Y');
                $model->namaasset = $request->namaasset;
                $model->alamat = $request->alamat;
                $model->lt = $request->lt;
                $model->lb = $request->lb;
                $model->kamar = $request->kamar;
                $model->km = $request->km;
                $model->listrik = $request->listrik;
                $model->panjang = $request->panjang;
                $model->hadap = $request->hadap;
                
                $model->namapenyewa = $request->nama_penyewa;
                $model->harga = $request->harga_jual & $request->harga_sewa ;
                $model->harga_jual = $request->harga_jual;
                $model->harga_sewa = $request->harga_sewa;
                $model->satuan_sewa = $request->satuan_sewa;
                $model->satuan_jual = $request->satuan_jual;
                // $model->jual = $request->harga;
                $model->satuan_jual= $request->satuan_jual;
                $model->tgl_sewa = $request->$tgl;
                $model->masa_sewa = $request->masa_sewa;
                $tgl = Carbon::createFromFormat('d/m/Y',$request->tgl_sewa)->format('d-m-Y');
                $masa_akhir = Carbon::parse($tgl)->addYears($request->masa_sewa)->format('Y-m-d');
                $model->masa_akhir = $masa_akhir;
                $model->lebar = $request->lebar;
                $model->air = $request->air;
                $model->legal = $request->legalitas;
                $model->an_legal = $request->an_setipikat;
                $model->no_legal = $request->no_setipikat;
                $model->hadap = $request->manghadap;
                $model->status = $request->status;
                $model->is_delete = '0';

                $model->save();

                if($request->perizinan){
                    $request->perizinan = json_decode(json_encode($request->perizinan));
                    // dd($request->perizinan);
                    foreach($request->perizinan as $r){
                        $perizinan = empty($r->id) ? new Perizinan() : Perizinan::find($r->id);
                        $perizinan->line_no = $r->line_no;
                        $perizinan->nomor = $r->nomor;
                        $perizinan->perizinan = $r->legalitas;
                        $perizinan->tgl_izin = date('Y-m-d', strtotime($r->tgl_izin));
                        $perizinan->id_asset = $model->id;
                        $perizinan->save();
                    }
                }

                if($request->dokumentasi){
                    foreach($request->dokumentasi as $r){
                        if(isset($r['file'])){
                            $file = $r['file'];
                            $basePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
     
                            // dd($file);
                            $dokumentasi = empty($r['id']) ? new Dokumentasi() : Dokumentasi::find($r['id']);
                            $fileName = str_replace(' ','_',$file->getClientOriginalName());
                            $fileNameDB = date('Y-m-d-H-i-s') . $fileName;
                            dd($fileNameDB);
                            $path = $file->storeAs('public/file/foto/big', $fileName);
                            
                            $upload =  UtilUploadFoto::UploadFoto($file, $basePath, 75);
                            // UtilCompressImage::compressImage($filetemp, $fileDest, 75);
                             /*Remove file Original*/
                             $dokumentasi->line_no = $r['line_no'];
                             $dokumentasi->pathfoto = $upload['path'];
                             $dokumentasi->url = $upload['url'];
                             $dokumentasi->file_name = $fileNameDB;
                             $dokumentasi->keterangan = $r['keterangan'];
                             $dokumentasi->id_asset = $model->id;
    
                            $dokumentasi->save();
                        } else {
                            $dokumentasi = empty($r['id']) ? new Dokumentasi() : Dokumentasi::find($r['id']);
                            $dokumentasi->pathfoto = '-';
                            $dokumentasi->keterangan = $r['keterangan'];
   
                            $dokumentasi->save();
                        }
          
                    }
                }

                $log = new LogHistory();
                $log->id_user = $request->session()->get('id');
                $log->status = 'CREATED ASSET';
                $log->save();

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

    public function detail(Request $request, $id){
        $model = Asset::query()->where(['id' => $request->id])->first();
        // dd($model->dokumentasi);
        $title = 'Detail Asset '.$model->namaasset;

        return view('admin.md.asset.detail', compact('model', 'title'));
    }

    public function simpan(Request $request, $id){

        $log = new LogHistory();
        $log->id_user = $request->session()->get('id');
        $log->id_asset = $id;
        $log->status = $request->keterangan;
        $log->save(); 

        return response()->json('Sukses disimpan');
    }

    public function export(Request $request, $id){
        $model = Asset::query()->where(['id' => $request->id])->first();

        $pdf = PDF::loadView('export', compact('model'));
        return $pdf->download($model->namaasset.'.pdf');
    }
}
