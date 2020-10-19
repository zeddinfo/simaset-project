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

    .card-header {
        background-color: #6777ef !important;
    }

    h3 {
        color: white;
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
                        <form action="{{url()->current()}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>NAMA ASSET</b><span id="wajib"> *</span></label>
                                        <input type="text" class="form-control" id="nama_asset" name="namaasset"
                                            placeholder="Masukan Nama Asset ...">
                                    </div>
                                    <div class="form-group">
                                        <label><b>ALAMAT ASSET</b><span id="wajib"> *</span></label>
                                        <textarea class="form-control" name="alamat"></textarea>
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
                                                            <input type="text" class="form-control text-right angka"
                                                                placeholder="" name="lt" id="lt">
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
                                                            <input type="text" class="form-control text-right angka"
                                                                placeholder="" name="lb" id="lb">
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
                                                        <input type="text" class="wide-pj angka" placeholder=""
                                                            name="lb" id="lb" style="width: 82px">
                                                        <input type="text" class="wide-lb angka" placeholder=""
                                                            name="lb" id="lb"
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
                                                    <td><label style="width:120px" for="listrik">&bull; Listrik</label>
                                                    </td>
                                                    <td><label style="width:130px" for="air">&bull; Air</label></td>

                                                </tr>
                                                <tr>
                                                    <td style="width:200px"><select name="listrik" title="Daya Listrik"
                                                            style="width:170px" id="listrik"
                                                            class="custom-select wide" />
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
                                            <select id="inputState" class="form-control" name="status">
                                                <option value="">- Pilih -</option>
                                                <option value="DIJUAL">DIJUAL</option>
                                                <option value="DISEWAKAN">DISEWAKAN</option>
                                                <option value="DIJUAL / DISEWAKAN">DIJUAL / DISEWAKAN</option>
                                                <option value="MAINTENANCE">MAINTENANCE</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState"><b>MENGHADAP</b></label>
                                            <select id="inputState" class="form-control" name="manghadap">
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
                                            placeholder="Masukan Nama Penyewa ..." style="width: 97%" name="nama_penyewa">
                                    </div>
                                    <div class="form-group ml-3">
                                        <label><strong>MASA SEWA</strong></label>
                                        <table border="0" cellpadding="7" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>&bull; Mulai Disewa</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" required class="form-control datepicker"
                                                             id="start_rent" name="tgl_sewa"
                                                                placeholder="Silahkan Pilih Tanggal ...">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button">
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&bull; Masa Sewa</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control text-right angka"
                                                                placeholder="" name="masa_sewa"
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
                                    <div class="form-group ml-3">
                                        <label><strong>HARGA</strong></label>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control numeric" id="inputCity"
                                                    placeholder="JUAL" name="harga">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select id="inputState" class="form-control" name="satuan_harga">
                                                    <option value="">- Pilih -</option>
                                                    <option value="/ Meter">/ Meter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control numeric" id="inputCity" name="satuan_sewa"
                                                    placeholder="SEWA">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select id="inputState" class="form-control">
                                                    <option value="">- Pilih -</option>
                                                    <option value="/ Meter">/ Tahun</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><b>EMBED GOOGLE MAPS</b><span id="wajib"> *</span></label>
                                            <textarea class="form-control"></textarea>
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
                                                {{-- @foreach($model->budgetBelanja as $i => $budgetBelanja)
                                          @include('transaksi.rab.form_budget_line', ['i' => $i, 'model' => $budgetBelanja, 
                                          'name' =>  'budgetBelanja'])
                                      @endforeach --}}
                                                <tr>
                                                    <td>
                                                        <select id="inputLegalitas" class="form-control"
                                                            name="legalitas">
                                                            <option value="">- Pilih -</option>
                                                            <option value="SHM">SHM</option>
                                                            <option value="SHBG">SHBG</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control angka" required
                                                            name="no_setipikat">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" required
                                                            name="an_setipikat">
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
    function renumberLineDokumentasi(){
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
            todayBtn: true,
            todayHighlight: true
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

    });

</script>
@endsection
