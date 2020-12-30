@extends('layouts.app')

@section('content')
<style>
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
        background-color: #6777ef;
    }

    .nav-tabs .nav-item .nav-link {
        color: white;
    }


    .modal-content {
        margin: 2px auto;
        z-index: 1100 !important;
    }

</style>
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Detail Asset</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Detail Asset</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-asset" role="tab"
                                aria-controls="tab-list" aria-selected="true"><i class="fas fa-info"></i> <b> Detail
                                    Asset</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-perizinan" role="tab"
                                aria-controls="tab-dijual" aria-selected="true"><i class="fas fa-hammer"></i><b>
                                    Legalitas dan Perizinan</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-tenant" role="tab"
                                aria-controls="tab-disewa" aria-selected="true"><i class="fas fa-donate"></i><b>
                                    Tenant</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-foto" role="tab"
                                aria-controls="tab-dijual-disewa" aria-selected="true"><i class="fas fa-image"></i>
                                <b>Foto Asset</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-map" role="tab"
                                aria-controls="tab-maintenance" aria-selected="true"><i class="fas fa-map"></i><b>
                                    Map</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-keterangan" role="tab"
                                aria-controls="tab-maintenance" aria-selected="true"><i class="fas fa-book"></i><b>
                                    Keterangan</b>
                            </a>
                        </li>
                    </ul>

                    <form role="form" id="frm-keterangan">

                        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal Keterangan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="card-body">
                        <div class="card">
                            <div class="tab-content" id="myTabContent" style="padding: 10px">
                                <div class="tab-pane fade show active" id="tab-asset" role="tabpanel"
                                    aria-labelledby="tab-1">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label "><b>NAMA ASSET</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputEmail3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->namaasset : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3"
                                                class="col-sm-3 col-form-label"><b>ALAMAT</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->alamat : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>LT / LB</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->lt.' M2 '. ' /  ' .$model->lb. ' M2' : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>KAMAR /
                                                    RUANGAN</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->kamar : '-'}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>KAMAR
                                                    MANDI</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->km : '-'}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>DAYA
                                                    LISTRIK</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->listrik : '-'}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>AIR</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->air : '-'}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>HARGA
                                                    Fix</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? 'Rp ' .$model->hargaa : 'Rp -'}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>HARGA
                                                    JUAL</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? 'Rp ' .$model->harga_jual : 'Rp -'}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>HARGA
                                                    SEWA</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? 'Rp ' .$model->harga_sewa : 'Rp -'}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="tab-perizinan" role="tabpanel"
                                    aria-labelledby="tab-1">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label "><b>LEGALITAS</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputEmail3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->legal : '-'}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>AN.
                                                    LEGAL</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->an_legal : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>NO
                                                    LEGALITAS</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="-" readonly
                                                    value="{{isset($model) ? $model->no_legal : ''}}">
                                            </div>
                                        </div>
                                        @php
                                        $user = count($model->perizinan);
                                        // dd($user);
                                        @endphp
                                        @if ($user == 1)
                                        @include('admin.md.asset.component.perizinan1');
                                        @endif
                                        @if($user == 2)
                                        @include('admin.md.asset.component.perizinan2');
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="tab-tenant" role="tabpanel" aria-labelledby="tab-1">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label "><b>NAMA
                                                    PENYEWA</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputEmail3"
                                                    placeholder="Nama Penyewa" readonly
                                                    value="{{isset($model) ? $model->namapenyewa : '-'}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>MULAI
                                                    SEWA</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="" readonly
                                                    value="{{isset($model) ? $model->tgl_sewa: ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>MASA SEWA</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="" readonly
                                                    value="{{isset($model) ? $model->masa_sewa. ' TAHUN' : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label"><b>ESTIMASI
                                                    TANGGAL AKHIR SEWA</b> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control bg-white" id="inputPassword3"
                                                    placeholder="" readonly
                                                    value="{{isset($model) ? $model->masa_akhir : '00 - 00 - 0000'}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-foto" role="tabpanel" aria-labelledby="tab-1">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            @foreach ($model->dokumentasi as $r)
                                            <div class="col-md-6">
                                                <span>{{$r->file_name}}</span>
                                                @php 
                                                    $link = "http://localhost/sim/sim/simaset/simaset-project/simaset/";
                                                @endphp
                                                <img src="{{$link.$r->url}}"
                                                    style="width: 400px;margin: 5px;border: 1px solid black;border-radius: 5px;">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-map" role="tabpanel" aria-labelledby="tab-1">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <iframe src="{{isset($model) ? $model->embed_google : '-'}}" width="100%"
                                                height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-keterangan" role="tabpanel" aria-labelledby="tab-1">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <button class="btn btn-primary" type="button" id="btn-keterangan"><i
                                                    class="fas fa-plus"></i> Tambah 
                                                Keterangan</button> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
 
                    </div> 
                </div> 
            </div> 
        </div>  
    </div> 

</section> 
@section('script')
<script>
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);

    function simpan() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `{{url('md/asset/simpanKeterangan/${id}')}}`,
            data: $('#frm-keterangan').serialize(),
            dataType: 'JSON',
            type: 'POST',
            success: function (res) {
                $('#exampleModal').modal('hide');
                $('#keterangan').text('');
            }
        });
    }

    $(document).ready(function () {
        $('#btn-keterangan').click(function () {
            $('#exampleModal').modal('show');
            $('.modal-backdrop').css('display', 'none');
        });
    });

</script>
@endsection
@endsection
