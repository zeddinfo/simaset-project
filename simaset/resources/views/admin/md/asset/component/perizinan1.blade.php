<div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label"><b>PERIZINAN 1</b> </label>
    <div class="col-sm-9">
        <input type="text" class="form-control bg-white" id="inputPassword3"
            placeholder="Password" readonly
            value="{{isset($model) && $model->perizinan[0]->perizinan ? $model->perizinan[0]->perizinan. ' NOMOR '.$model->perizinan[0]->nomor : '-NOMOR'}}">
    </div>
</div>
<div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label"><b>DITERBITKAN</b> </label>
    <div class="col-sm-9">
        <input type="text" class="form-control bg-white" id="inputPassword3"
            placeholder="Password" readonly
            value="{{isset($model) && $model->perizinan[0]->tgl_izin ? $model->perizinan[0]->tgl_izin : '00 - 00 - 0000'}}">
    </div>
</div>
<div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label"><b>PERIZINAN 2</b> </label>
    <div class="col-sm-9">
        <input type="text" class="form-control bg-white" id="inputPassword3"
            placeholder="Password" readonly
            value="- NOMOR">
    </div>
</div>
<div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label"><b>DITERBITKAN</b>
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control bg-white" id="inputPassword3"
            placeholder="Password" readonly
            value="00 - 00 - 0000">
    </div>
</div>