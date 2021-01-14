@extends('layouts.app')

@section('content')
<style>
    .box {
        color: #000;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }

    .DIJUAL {
        background: #fff;
    }

    .DISEWAKAN {
        background: #fff;
    }

    .MAINTENANCE {
        background: #fff;
    }

    .DIJUALatauDISEWA {
        background: #fff;
    }

    #wajib {
        color: red;
    }

    .input-group>.input-group-append>.input-group-text {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border: white;
    }

    .wide-lb {
        width: 100%;
        border-color: #e4e6fc;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    .wide-pj {
        width: 100%;
        margin-right: 20px;
        border-color: #e4e6fc;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    small#x {
        margin-left: 102px;
    }

    small#m {
        margin-left: 100px;
    }

    .card-header {
        background-color: #6777ef !important;
    }

    h3 {
        color: white;
    }

    img#dokumentasi {
        border: 1px solid #6777ef;
        border-radius: 5px;
    }

</style>
<section class="section">
    <div class="section-header">
        <h1>Input Master Asset</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Master Asset</a></div>
            <div class="breadcrumb-item">Input Master Asset</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Input Master Data Asset</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>NAMA ASSET</b><span id="wajib"> *</span></label>
                                        <input type="text" class="form-control" id="nama_asset" name="namaasset"
                                            placeholder="Masukan Nama Asset ..."
                                            value="{{isset($model) ? $model->namaasset : ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>ALAMAT ASSET</b><span id="wajib"> *</span></label>
                                        <textarea class="form-control"
                                            name="alamat">{{isset($model) ? $model->alamat : ''}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>UKURAN</strong></label>
                                        <table border="0" cellpadding="7" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>&bull; Luas Tanah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group col-md-12">
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="lt" id="lt"
                                                                value="{{isset($model) ? $model->lt : ''}}">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">M<sup>2</sup></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&bull; Luas Bangunan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group col-md-12">
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="lb" id="lb"
                                                                value="{{isset($model) ? $model->lb : ''}}">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">M<sup>2</sup></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&bull; Lebar x Panjang</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="wide-pj col-md-6" placeholder=""
                                                            name="lebar" value="{{isset($model) ? $model->lebar : ''}}"
                                                            id="lb" style="width: 60px">
                                                        <input type="text" class="wide-lb col-md-6" placeholder=""
                                                            name="panjang"
                                                            value="{{isset($model) ? $model->panjang : ''}}" id="lb"
                                                            style="width: 82px;margin-right: -200px"><small
                                                            id="x">X</small><small id="m"><b>M</b></small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <table border="0" cellpadding="7" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td><label style="width:120px" for="kamar">&bull; Kamar /
                                                            Ruangan</label></td>
                                                    <td><label style="width:130px" for="km">&bull; Kamar Mandi</label>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td style="col-md-6"><select name="kamar"
                                                            title="Kamar Tidur / Ruangan" style="col-md-6" id="kamar"
                                                            class="custom-select wide" />
                                                        <option value="{{isset($model) ? $model->kamar : ''}}"
                                                            selected="selected">
                                                            {{isset($model) && $model->kamar ? $model->kamar : ' - PILIH -'}}
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        </select>
                                                    </td>

                                                    <td style="col-md-6"><select name="km" title="Kamar Mandi"
                                                            style="col-md-6" id="km" class="custom-select wide" />
                                                        <option value="{{isset($model) ? $model->km : ''}}"
                                                            selected="selected">
                                                            {{isset($model) && $model->km ? $model->km : ' - PILIH -'}}
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <table border="0" cellpadding="7" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td><label style="width:120px" for="listrik">&bull; Listrik</label>
                                                    </td>
                                                    <td><label style="width:130px" for="air">&bull; Air</label></td>

                                                </tr>
                                                <tr>
                                                    <td style="col-md-6"><select name="listrik" title="Daya Listrik"
                                                            style="wcol-md-6" id="listrik" class="custom-select wide" />
                                                        <option value="{{isset($model) ? $model->listrik : ''}}"
                                                            selected="selected">
                                                            {{isset($model) && $model->listrik ? $model->listrik : ' - PILIH -'}}
                                                        </option>
                                                        <option value="1.300">1.300</option>
                                                        <option value="2.200">2.200</option>
                                                        <option value="3.500">3.500</option>
                                                        <option value="4.400">4.400</option>
                                                        <option value="5.500">5.500</option>
                                                        <option value="6.600">6.600</option>
                                                        <option value="di atas 6.600">di atas 6.600</option>
                                                        </select>
                                                    </td>

                                                    <td style="col-md-6"><select name="air" title="Air" style="col-md-6"
                                                            id="air" class="custom-select wide">
                                                            <option value="{{isset($model) ? $model->air : ''}}"
                                                                selected="selected">
                                                                {{isset($model) && $model->air ? $model->air : ' - PILIH -'}}
                                                            </option>
                                                            <option value="Artetis">Artetis</option>
                                                            <option value="Sumur">Sumur</option>
                                                            <option value="Pam">Pam</option>
                                                            <option value="Artetis + Pam">Artetis + Pam</option>
                                                            <option value="Pam + Sumur">Pam + Sumur</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row ml-2">

                                        <div class="form-group col-md-6">
                                            <label for="inputState"><b>MENGHADAP</b></label>
                                            <select id="inputState" class="form-control" name="manghadap">
                                                <option value="{{isset($model) ? $model->hadap : ''}}"
                                                    selected="selected">
                                                    {{isset($model) && $model->hadap ? $model->hadap : ' - PILIH -'}}
                                                </option>
                                                <option value="Utara">Utara</option>
                                                <option value="Timur Laut">Timur Laut</option>
                                                <option value="Timur">Timur</option>
                                                <option value="Tenggara">Tenggara</option>
                                                <option value="Selatan">Selatan</option>
                                                <option value="Barat Daya">Barat Daya</option>
                                                <option value="Barat">Barat</option>
                                                <option value="Barat Laut">Barat Laut</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputCity"><b>STATUS</b></label>
                                        <select id="condition" class="form-control" name="status">
                                            <option value="{{isset($model) ? $model->status : ''}}" selected="selected">
                                                {{isset($model) && $model->status ? $model->status : ' - PILIH -'}}
                                            </option>
                                            <option value="DIJUAL" id="dijual">DIJUAL</option>
                                            <option value="DISEWAKAN" id="disewakan">DISEWAKAN</option>
                                            <option value="DIJUALatauDISEWA" id="jual-sewa">DIJUAL / DISEWAKAN</option>
                                            <option value="MAINTENANCE" id="maintenance">MAINTENANCE</option>
                                        </select>

                                        <div class="DISEWAKAN box col-md-12 disewakan">
                                            <div class="form-group col-md-12">
                                                <label><strong>DISEWAKAN</strong></label>
                                                <br>
                                                <!-- <table border="0" cellpadding="7" cellspacing="0"> -->
                                                <tbody class="col-md-12">
                                                    <tr>
                                                        <td>&bull; Nama Penyewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>

                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-right"
                                                                    placeholder="" name="nama_penyewa"
                                                                    value="{{isset($model) ? $model->nama_penyewa : ''}}"
                                                                    id="condition">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text showing"></div>
                                                                </div>
                                                            </div>
                                                            <!--                                                     
                                                        <input type="text" class="form-control col-md-12" id="nama_penyewa" value="{{isset($model) ? $model->namapenyewa : ''}}"
                                                                placeholder="Masukan Nama Penyewa ..."  name="nama_penyewa"> -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Mulai Disewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" required
                                                                    class="form-control datepicker" id="condition"
                                                                    name="tgl_sewa"
                                                                    placeholder="Silahkan Pilih Tanggal ..."
                                                                    value="{{isset($model) ? $model->mulai_sewa : ''}}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button">
                                                                        <i class="fa fa-calendar"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Masa Sewa</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-left angka"
                                                                    placeholder="" name="masa_sewa"
                                                                    value="{{isset($model) ? $model->masa_sewa : ''}}"
                                                                    id="condition">
                                                                <div class="input-group-append ">
                                                                    <div class="input-group-text showing">/ Tahun</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Harga Sewa</td>
                                                        <div class="input-group col-md-12">

                                                            <input type="text showing"
                                                                class="form-control numeric col-md-8" id="harga_sewa"
                                                                name="harga_sewa" placeholder="SEWA" name="harga_sewa"
                                                                value="{{isset($model) ? $model->harga_sewa : ''}}">
                                                            <input type="hidden" name="harga_asset" id="condition">


                                                            <select id="condition" class="form-control col-md-4"
                                                                name="satuan_sewa">
                                                                <option
                                                                    value="{{isset($model) ? $model->satuan_sewa : ''}}"
                                                                    selected="selected">
                                                                    {{isset($model) && $model->satuan_sewa ? $model->satuan_sewa : ' - PILIH -'}}
                                                                </option>
                                                                <option value="/ Tahun">/ Tahun</option>
                                                            </select>
                                                        </div>
                                                    </tr>
                                                </tbody>
                                            </div>
                                        </div>


                                        {{-- <div class="DIJUAL box col-md-12 dijual">
                                            <div class="form-group col-md-12">
                                                <label><strong>DIJUAL</strong></label>
                                                <br>
                                                <!-- <table border="0" cellpadding="7" cellspacing="0"> -->
                                                <tbody class="col-md-12">
                                                    <tr>
                                                        <td>&bull; Nama Penyewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>

                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-right"
                                                                    placeholder="" name="nama_penyewa"
                                                                    value="{{isset($model) ? $model->nama_penyewa : ''}}"
                                                                    id="condition">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text dijual"></div>
                                                                </div>
                                                            </div>
                                                            <!--                                                     
                                                        <input type="text" class="form-control col-md-12" id="nama_penyewa" value="{{isset($model) ? $model->namapenyewa : ''}}"
                                                                placeholder="Masukan Nama Penyewa ..."  name="nama_penyewa"> -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Mulai Disewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" required
                                                                    class="form-control datepicker" id="condition"
                                                                    name="tgl_sewa"
                                                                    placeholder="Silahkan Pilih Tanggal ..."
                                                                    value="{{isset($model) ? $model->mulai_sewa : ''}}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button">
                                                                        <i class="fa fa-calendar"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Masa Sewa</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-left angka"
                                                                    placeholder="" name="masa_sewa"
                                                                    value="{{isset($model) ? $model->masa_sewa : ''}}"
                                                                    id="condition">
                                                                <div class="input-group-append ">
                                                                    <div class="input-group-text showing">/ Tahun</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Harga Sewa</td>


                                                        <div class="input-group col-md-12">

                                                            <input type="text showing"
                                                                class="form-control numeric col-md-8" id="harga_sewa"
                                                                name="harga_sewa" placeholder="SEWA" name="harga_sewa"
                                                                value="{{isset($model) ? $model->harga_sewa : ''}}">
                                                            <input type="hidden" name="harga_asset" id="condition">
                                                            <select id="condition showing" class="form-control col-md-4"
                                                                name="satuan_sewa">
                                                                <option
                                                                    value="{{isset($model) ? $model->satuan_sewa : ''}}"
                                                                    selected="selected">
                                                                    {{isset($model) && $model->satuan_sewa ? $model->satuan_sewa : ' - PILIH -'}}
                                                                </option>
                                                                <option value="/ Tahun">/ Tahun</option>
                                                            </select>
                                                        </div>

                                                    </tr>
                                                </tbody>

                                            </div>

                                        </div> --}}

                                        <div class="form-group mt-3" id="section-header" style="display: none">
                                            <div class="form-group row ml-3" id="penyewa">
                                                <label for="inputEmail4" id="label-nama"><b>NAMA PENYEWA</b><span id="wajib"> *</span></label>
                                            <input type="text" class="form-control" id="nama_penyewa" value="{{isset($model) ? $model->namapenyewa : ''}}"
                                                    placeholder="Masukan Nama Penyewa ..." style="width: 97%" name="nama_penyewa">
                                            </div>
                                            <div class="form-group ml-3">
                                                <label id="label-masa"><strong>MASA SEWA</strong></label>
                                                <table border="0" cellpadding="7" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>&bull; Mulai</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                
                                                                    <input type="text" required class="form-control datepicker"
                                                                     id="tgl_sewa" name="tgl_sewa"
                                                                    placeholder="Silahkan Pilih Tanggal ..." value="{{isset($model) ? $model->mulai_sewa : ''}}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-primary" type="button">
                                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&bull; Masa </td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group mb-2">
                                                                    <input type="text" class="form-control text-right angka"
                                                                placeholder="" name="masa_sewa" value="{{isset($model) ? $model->masa_sewa : ''}}"
                                                                        id="lb">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">Tahun</div>
                                                                    </div>
                                                                </div>
        
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        {{-- <div class="form-group mt-3" id="sectio-harga-sewa" style="display: none">
                                            <div class="form-group ml-3">
                                                <label><strong>HARGA</strong></label>
        
                                            
        
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control numeric" id="harga_jual"
                                                    placeholder="JUAL" name="harga_jual" value="{{isset($model) ? $model->harga_jual : ''}}">
                                                        <input type="hidden" name="harga_asset" id="harga_asset">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <select id="inputState" class="form-control" name="satuan_jual">
                                                            <option value="{{isset($model) ? $model->satuan_jual : ''}}" selected="selected">{{isset($model) && $model->satuan_jual ? $model->satuan_jual : ' - PILIH -'}}</option>
                                                            <option value="/ Meter">/ Meter</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control numeric" id="harga_sewa" name="harga_sewa"
                                                            placeholder="SEWA" name="harga_sewa" value="{{isset($model) ? $model->harga_sewa : ''}}">
                                                            <input type="hidden" name="harga_asset" id="harga_asset">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <select id="satuan_sewa" class="form-control" name="satuan_sewa">
                                                            <option value="{{isset($model) ? $model->satuan_sewa : ''}}"selected="selected">{{isset($model) && $model->satuan_sewa ? $model->satuan_sewa : ' - PILIH -'}}</option>
                                                            <option value="/ Tahun">/ Tahun</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div> --}}

                                        <div class="form-group mt-3" id="section-harga" style="display: none">
                                            <div class="form-group ml-3">
                                                <label id="label-harga"><strong>HARGA</strong></label>
        

        
                                                <div class="form-row" id="section-harga-jual" style="display: none">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control numeric" id="harga_jual"
                                                    placeholder="JUAL" name="harga_jual" value="{{isset($model) ? $model->harga_jual : ''}}">
                                                        <input type="hidden" name="harga_asset" id="harga_asset">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <select id="inputState" class="form-control" name="satuan_jual">
                                                            <option value="{{isset($model) ? $model->satuan_jual : ''}}" selected="selected">{{isset($model) && $model->satuan_jual ? $model->satuan_jual : ' - PILIH -'}}</option>
                                                            <option value="/ Meter">/ Meter</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row" id="section-harga-sewa" style="display: none">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" class="form-control numeric" id="harga_sewa" name="harga_sewa"
                                                            placeholder="SEWA" name="harga_sewa" value="{{isset($model) ? $model->harga_sewa : ''}}">
                                                            <input type="hidden" name="harga_asset" id="harga_asset">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <select id="satuan_sewa" class="form-control" name="satuan_sewa">
                                                            <option value="{{isset($model) ? $model->satuan_sewa : ''}}"selected="selected">{{isset($model) && $model->satuan_sewa ? $model->satuan_sewa : ' - PILIH -'}}</option>
                                                            <option value="/ Tahun">/ Tahun</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>






                                        {{-- <div class="DIJUALatauDISEWA box col-md-12 dijualataudisewa">
                                            <div class="form-group col-md-12">

                                                <label><strong>DIJUAL/DISEWAKAN</strong></label>
                                                <br>

                                                <!-- <table border="0" cellpadding="7" cellspacing="0"> -->
                                                <tbody class="col-md-12">
                                                    <tr>
                                                        <td>&bull; Nama Penyewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>

                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-right"
                                                                    placeholder="" name="nama_penyewa"
                                                                    value="{{isset($model) ? $model->nama_penyewa : ''}}"
                                                                    id="namapenyewa">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text"></div>
                                                                </div>
                                                            </div>
                                                            <!--                                                     
                                                        <input type="text" class="form-control col-md-12" id="nama_penyewa" value="{{isset($model) ? $model->namapenyewa : ''}}"
                                                                placeholder="Masukan Nama Penyewa ..."  name="nama_penyewa"> -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Mulai Disewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" required
                                                                    class="form-control datepicker" id="tgl_sewa"
                                                                    name="tgl_sewa"
                                                                    placeholder="Silahkan Pilih Tanggal ..."
                                                                    value="{{isset($model) ? $model->mulai_sewa : ''}}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button">
                                                                        <i class="fa fa-calendar"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&bull; Masa Sewa</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group col-md-12">
                                                            <input type="text" class="form-control text-left angka"
                                                        placeholder="" name="masa_sewa" value="{{isset($model) ? $model->masa_sewa : ''}}"
                                                        id="masa_sewa">
                                                            <div class="input-group-append ">
                                                                <div class="input-group-text">/ Tahun</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Masa Sewa</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-left angka"
                                                                    placeholder="" name="masa_sewa"
                                                                    value="{{isset($model) ? $model->masa_sewa : ''}}"
                                                                    id="masa_sewa">
                                                                <div class="input-group-append ">
                                                                    <div class="input-group-text showing">/ Tahun</div>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Harga Sewa</td>


                                                        <div class="input-group col-md-12">

                                                            <input type="text showing"
                                                                class="form-control numeric col-md-8" id="harga_sewa"
                                                                name="harga_sewa" placeholder="SEWA" name="harga_sewa"
                                                                value="{{isset($model) ? $model->harga_sewa : ''}}">
                                                            <input type="hidden" name="harga_asset" id="harga_sewa">


                                                            <select id="harga_sewa" class="form-control col-md-4"
                                                                name="satuan_sewa">
                                                                <option
                                                                    value="{{isset($model) ? $model->satuan_sewa : ''}}"
                                                                    selected="selected">
                                                                    {{isset($model) && $model->satuan_sewa ? $model->satuan_sewa : ' - PILIH -'}}
                                                                </option>
                                                                <option value="/ Tahun">/ Tahun</option>
                                                            </select>
                                                        </div>

                                                    </tr>
                                                </tbody>

                                            </div>

                                        </div> --}}


                                        {{-- <div class="MAINTENANCE box col-md-12 maintenance">
                                            <div class="form-group col-md-12">

                                                <label><strong>Maintenance</strong></label>
                                                <br>

                                                <!-- <table border="0" cellpadding="7" cellspacing="0"> -->
                                                <tbody class="col-md-12">
                                                    <tr>
                                                        <td>&bull; Nama Penyewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>

                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-right"
                                                                    placeholder="" name="nama_penyewa"
                                                                    value="{{isset($model) ? $model->nama_penyewa : ''}}"
                                                                    id="condition">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text showing"></div>
                                                                </div>
                                                            </div>
                                                            <!--                                                     
                                                        <input type="text" class="form-control col-md-12" id="nama_penyewa" value="{{isset($model) ? $model->namapenyewa : ''}}"
                                                                placeholder="Masukan Nama Penyewa ..."  name="nama_penyewa"> -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Mulai Disewa</td>
                                                        <!-- <td>:</td> -->
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" required
                                                                    class="form-control datepicker" id="condition"
                                                                    name="tgl_sewa"
                                                                    placeholder="Silahkan Pilih Tanggal ..."
                                                                    value="{{isset($model) ? $model->mulai_sewa : ''}}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button">
                                                                        <i class="fa fa-calendar"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Masa Sewa</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control text-left angka"
                                                                    placeholder="" name="masa_sewa"
                                                                    value="{{isset($model) ? $model->masa_sewa : ''}}"
                                                                    id="condition">
                                                                <div class="input-group-append ">
                                                                    <div class="input-group-text showing">/ Tahun</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&bull; Harga Sewa</td>


                                                        <div class="input-group col-md-12">

                                                            <input type="text showing"
                                                                class="form-control numeric col-md-8" id="harga_sewa"
                                                                name="harga_sewa" placeholder="SEWA" name="harga_sewa"
                                                                value="{{isset($model) ? $model->harga_sewa : ''}}">
                                                            <input type="hidden" name="harga_asset" id="condition">


                                                            <select id="condition showing" class="form-control col-md-4"
                                                                name="satuan_sewa">
                                                                <option
                                                                    value="{{isset($model) ? $model->satuan_sewa : ''}}"
                                                                    selected="selected">
                                                                    {{isset($model) && $model->satuan_sewa ? $model->satuan_sewa : ' - PILIH -'}}
                                                                </option>
                                                                <option value="/ Tahun">/ Tahun</option>
                                                            </select>
                                                        </div>

                                                    </tr>
                                                </tbody>

                                            </div>

                                        </div> --}}

                                        <div class="form-group mt-3" id="section-embde-google">
                                            <label><b>EMBED GOOGLE MAPS</b><span id="wajib"> *</span></label>
                                            <textarea class="form-control"
                                            
                                                name="embed_google">{{isset($model) ? $model->embed_google : ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <template class="tmp-line">@include('admin.md.asset.form_perizinan', [
                                'i' => '__INDEX__',
                                'model' => new \App\Models\Md\Perizinan,
                                'name' => 'perizinan'
                                ])</template>
                            <template class="tmp-line-dok">@include('admin.md.asset.form_dokumentasi', [
                                'i' => '__INDEX__',
                                'model' => new \App\Models\Md\Dokumentasi,
                                'name' => 'dokumentasi'
                                ])</template>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-legalisasi"
                                        role="tab" aria-controls="tab-legalitas" aria-selected="true"><i
                                            class="fas fa-gavel"></i> Legalitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-perizinan" role="tab"
                                        aria-controls="tab-perizinan" aria-selected="true"><i
                                            class="fa fa-university"></i> Perizinan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-foto" role="tab"
                                        aria-controls="tab-foto" aria-selected="true"><i class="fas fa-image"></i>
                                        Foto</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent" style="padding: 10px">
                                <div class="tab-pane fade show active" id="tab-legalisasi" role="tabpanel"
                                    aria-labelledby="tab-1">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tabel-rab-budget" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Legalitas</th>
                                                    <th>No.Sertipikat</th>
                                                    <th>AN.Setipikat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select id="inputLegalitas" class="form-control"
                                                            name="legalitas">
                                                            <option value="{{isset($model) ? $model->legal : ''}}"
                                                                selected="selected">
                                                                {{isset($model) && $model->legal ? $model->legal : ' - PILIH -'}}
                                                            </option>
                                                            <option value="SHM">SHM</option>
                                                            <option value="SHGB">SHGB</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control angka" 
                                                    name="no_setipikat" value="{{isset($model) ? $model->no_legal : ''}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" 
                                                        name="an_setipikat" value="{{isset($model) ? $model->an_legal : ''}}">
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <div id="delete"></div> --}}
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-perizinan" role="tabpanel" aria-labelledby="tab-1">
                                    <button type="button" class="btn  btn-primary btn-default add-item mb-2" id="add"
                                        style="" onclick="addLine()"><i class="fa fa-plus"></i> Add Line</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tabel-perizinan" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Perizinan</th>
                                                    <th>Nomor</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($model->perizinan as $i => $perizinan)
                                                @include('admin.md.asset.form_perizinan', ['i' => $i, 'model' =>
                                                $perizinan,
                                                'name' => 'perizinan'])
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div id="delete"></div> --}}
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-foto" role="tabpanel" aria-labelledby="tab-1">
                                    <button type="button" class="btn  btn-primary btn-default add-item mb-2" id="add"
                                        style="" onclick="addLineDokumentasi()"><i class="fa fa-plus"></i> Add
                                        Line</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tabel-dokumentasi" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pilih Foto</th>
                                                    <th>Keterangan</th>
                                                    <th>File Terupload</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($model->dokumentasi as $i => $dokumentasi)
                                                @include('admin.md.asset.form_dokumentasi', ['i' => $i, 'model' =>
                                                $dokumentasi,
                                                'name' => 'dokumentasi'])
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div id="delete"></div> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-paper-plane"
                                        aria-hidden="true"></i> Submit</button>
                                <button class="btn btn-secondary" type="reset"><i class="fas fa-undo"></i>
                                    Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    // $(document).ready(function () {
    //     $('.dijual').hide();
    //     $('.disewakan').hide();
    //     $('.dijualatausewa').hide();
    //     $('.maintenance').hide();
    //     $('#condition').change(
    //         function () {
    //             if (this.value == "DIJUAL") {
    //                 $('.dijual').show();
    //                 $('.disewakan').hide();
    //                 $('.dijualataudisewa').hide();
    //                 $('.maintenance').hide();
    //             } else if (this.value == "DISEWAKAN") {
    //                 $('.disewakan').show();
    //                 $('.dijual').hide();
    //                 $('.dijualataudisewa').hide();
    //                 $('.maintenance').hide();
    //             } else if (this.value == "DIJUALatauDISEWA") {
    //                 $('.dijualataudisewa').show();
    //                 $('.disewakan').hide();
    //                 $('.dijual').hide();
    //                 $('.maintenance').hide();
    //             } else if (this.value == "MAINTENANCE") {
    //                 $('.maintenance').show();
    //                 $('.disewakan').hide();
    //                 $('.dijual').hide();
    //                 $('.dijualataudisewa').hide();
    //             }
    //         }
    //     )
    // });
    var index = {{$model->perizinan->count()-1}};
    var index1 = {{$model->dokumentasi->count()-1}};

    function autoNumeric() {
        $(".numeric").inputmask('decimal');
    }

    function addLine() {
        var tpl = $('template.tmp-line');

        index++;
        var template = tpl.html().replace(/__INDEX__/g, index);
        $('#tabel-perizinan > tbody').append(template);
        renumberLine();
    }

    function addLineDokumentasi() {
        var tpl = $('template.tmp-line-dok');

        index1++;
        var template = tpl.html().replace(/__INDEX__/g, index1);
        $('#tabel-dokumentasi > tbody').append(template);
        renumberLineDokumentasi();
    }

    function renumberLine() {
        var index = 1;
        $('#tabel-perizinan tbody tr').each(function () {
            $(this).find('[data-id = "line_no"]').val(index);
            index++;
        });
    }

    function renumberLineDokumentasi() {
        var index = 1;
        $('#tabel-dokumentasi tbody tr').each(function () {
            $(this).find('[data-id = "line_no"]').val(index);
            index++;
        });
    }
    $(document).ready(function () {
        autoNumeric();
        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy",
            immediateUpdates: true,
            // todayBtn: true,
            // todayHighlight: true,
            // startDate: "today",
        }).datepicker("setDate", "0");

        $(".angka").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('#harga').on('keypres', function () {
            var harga = $(this).val();
            $('#harga_sewa').val(harga);
        });

        $('#condition').change(function(){
            var value = $(this).val();
            if(value == 'DISEWAKAN'){
                $('#section-header').show();
                $('#penyewa').show();
                $('#tgl_sewa').show();
                $('#label-nama').html('NAMA PENYEWA');
                $('#label-masa').html('MASA SEWA');
                $('#section-harga').show();
                $('#section-harga-sewa').show();
                $('#section-harga-jual').hide();
                $('#label-harga').html('HARGA SEWA');
            } else if(value == 'DIJUAL'){
                $('#section-header').hide();
                $('#penyewa').hide();
                $('#tgl_sewa').hide();
                // $('#label-masa').html('MULAI DIJUAL');
                $('#section-harga').show();
                $('#section-harga-jual').show();
                $('#label-harga').html('HARGA JUAL');
            } else if(value == 'DIJUALatauDISEWA'){
                $('#section-header').show();
                $('#penyewa').show();
                $('#tgl_sewa').show();
                $('#label-nama').html('NAMA PENYEWA');
                $('#label-masa').html('MASA SEWA');
                $('#section-harga-sewa').show();
                $('#section-harga-jual').show();
                $('#label-harga').html('HARGA SEWA');
            } else if(value == 'MAINTENANCE'){
                $('#section-header').show();
                $('#penyewa').show();
                $('#tgl_sewa').show();
                $('#label-nama').html('NAMA VENDOR');
                $('#label-masa').html('MULAI MAINTENANCE');
                $('#section-harga').hide();
                $('#section-harga-sewa').hide();
                $('#label-harga').html('HARGA JUAL');
            } else {
                alert('Tidak Satupun Pilihan Benar')
            }
        })

    });

</script>
@endsection
