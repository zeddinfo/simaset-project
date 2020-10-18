@extends('layouts.app')

@section('content')
<style>
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

</style>
<section class="section">
    <div class="section-header">
        <h1>DataTables</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">DataTables</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Input Master Data Asset</h4>
                        <hr>
                        <div class="form-row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail4"><b>NAMA ASSET</b><span id="wajib"> *</span></label>
                                    <input type="text" class="form-control" id="nama_asset"
                                        placeholder="Masukan Nama Asset ...">
                                </div>
                                <div class="form-group">
                                    <label><b>ALAMAT ASSET</b><span id="wajib"> *</span></label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label><strong>UKURAN</strong></label>
                                    <table border="0" cellpadding="7" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td>&bull; Luas Tanah</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control text-right"
                                                            id="inlineFormInputGroup2" placeholder="" name="lt" id="lt">
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
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control text-right"
                                                            id="inlineFormInputGroup2" placeholder="" name="lb" id="lb">
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
                                                    <input type="text" class="wide-pj" placeholder="" name="lb" id="lb"
                                                        style="width: 82px">
                                                    <input type="text" class="wide-lb" placeholder="" name="lb" id="lb"
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
                                                <td><label style="width:130px" for="km">&bull; Kamar Mandi</label></td>

                                            </tr>
                                            <tr>
                                                <td style="width:200px"><select name="kamar"
                                                        title="Kamar Tidur / Ruangan" style="width:170px" id="kamar"
                                                        class="custom-select wide" />
                                                    <option value="-">- Pilih -</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    </select>
                                                </td>

                                                <td style="width:200px"><select name="km" title="Kamar Mandi"
                                                        style="width:170px" id="km" class="custom-select wide" />
                                                    <option value="-">- Pilih -</option>
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
                                                <td><label style="width:120px" for="listrik">&bull; Listrik</label></td>
                                                <td><label style="width:130px" for="air">&bull; Air</label></td>

                                            </tr>
                                            <tr>
                                                <td style="width:200px"><select name="listrik" title="Daya Listrik"
                                                        style="width:170px" id="listrik" class="custom-select wide" />
                                                    <option value="-">- Pilih -</option>
                                                    <option value="1.300">1.300</option>
                                                    <option value="2.200">2.200</option>
                                                    <option value="3.500">3.500</option>
                                                    <option value="4.400">4.400</option>
                                                    <option value="5.500">5.500</option>
                                                    <option value="6.600">6.600</option>
                                                    <option value="di atas 6.600">di atas 6.600</option>
                                                    </select>
                                                </td>

                                                <td style="width:200px"><select name="air" title="Air"
                                                        style="width:170px" id="air" class="custom-select wide" />
                                                    <option value="-">- Pilih -</option>
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
                                        <label for="inputCity"><b>STATUS</b></label>
                                        <select id="inputState" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="DIJUAL">DIJUAL</option>
                                            <option value="DISEWAKAN">DISEWAKAN</option>
                                            <option value="DIJUAL / DISEWAKAN">DIJUAL / DISEWAKAN</option>
                                            <option value="MAINTENANCE">MAINTENANCE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState"><b>MENGHADAP</b></label>
                                        <select id="inputState" class="form-control">
                                            <option value="-">- Pilih -</option>
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
                                <div class="form-group row ml-3">
                                    <label for="inputEmail4"><b>NAMA PENYEWA</b><span id="wajib"> *</span></label>
                                    <input type="text" class="form-control" id="nama_penyewa"
                                        placeholder="Masukan Nama Penyewa ..." style="width: 97%">
                                </div>
                                <div class="form-group ml-3">
                                    <label><strong>MASA SEWA</strong></label>
                                    <table border="0" cellpadding="7" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td>&bull; Mulai Disewa</td>
                                                <td>:</td>
                                                <td><div class="input-group" onclick="modalRab()">
                                                    <input type="text" required class="form-control datepicker"
                                                        name="rab_nobukti" id="rab_nobukti"
                                                        placeholder="Silahkan Pilih Tanggal ...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>&bull; Masa Sewa</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control text-right"
                                                            id="inlineFormInputGroup2" placeholder="" name="lb" id="lb">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">Tahun</div>
                                                        </div>
                                                    </div> 
                                                  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group ml-3">
                                    <label><strong>HARGA</strong></label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <input type="text" class="form-control" id="inputCity" placeholder="JUAL">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <select id="inputState" class="form-control">
                                            <option value="">- Pilih -</option>
											<option value="/ Meter">/ Meter</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <input type="text" class="form-control" id="inputCity" placeholder="SEWA">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <select id="inputState" class="form-control">
                                            <option value="">- Pilih -</option>
											<option value="/ Meter">/ Tahun</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>EMBED GOOGLE MAPAS</b><span id="wajib"> *</span></label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="inputCity"><b>STATUS ASSET<b></label>
                                    <select name="status" title="Status" style="width:170px" id="status"
                                        class="custom-select wide" />
                                    <option value="">- Pilih -</option>
                                    <option value="DIJUAL">DIJUAL</option>
                                    <option value="DISEWAKAN">DISEWAKAN</option>
                                    <option value="DIJUAL / DISEWAKAN">DIJUAL / DISEWAKAN</option>
                                    <option value="MAINTENANCE">MAINTENANCE</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
</section>
@endsection
