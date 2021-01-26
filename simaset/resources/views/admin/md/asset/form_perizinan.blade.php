<tr data-index-perizinan="{{$i}}">
    <input type="hidden" id="{{$name}}_{{$i}}_id" class="form-control " name="{{$name}}[{{$i}}][id]" placeholder="" readonly value="{{ isset($model) ? $model->id : ''}}" data-id="id">
    <td>
        <input type="text" id="{{$name}}_{{$i}}_line_no" class="form-control" name="{{$name}}[{{$i}}][line_no]" placeholder="" value="{{isset($model) ? $model->line_no : ''}}" readonly required="" data-id="line_no" im-insert="true" style="width: 50px">
    </td>
    <td>
        <select class="form-control" style="height: 50px;width:350px" id="{{$name}}_{{$i}}_legalitas" name="{{$name}}[{{$i}}][legalitas]" placeholder="Silahkan Pilih Item ..." required="" data-id="item" im-insert="true">

        <option value="{{isset($model) ? $model->perizinan : ''}}" selected="selected">{{isset($model) && $model->perizinan ? $model->perizinan : ' - PILIH -'}}</option>
        <option value="IMB">IMB</option>
        <option value="AMDAL">AMDAL</option>
        <option value="HO">HO</option>
    </select>
    </td>
    <td>
    <input type="text" id="{{$name}}_{{$i}}_nomor" class="form-control" name="{{$name}}[{{$i}}][nomor]" placeholder="" value="{{isset($model) ? $model->nomor : ''}}"  required="" data-id="nomor" im-insert="true">
    </td>
    <td>
    <input type="text" id="{{$name}}_{{$i}}_tgl_izin" class="form-control" 
    name="{{$name}}[{{$i}}][tgl_izin]" placeholder="" data-date-format="dd/mm/yyyy" 
    value="{{isset($model) ? date('d-m-Y', strtotime($model->tgl_izin)) : 
    date('Y-m-d')}}" required="" data-id="tgl-izin" im-insert="true">
    </td>
</tr>

<script>
    $('#{{$name}}_{{$i}}_tgl_izin').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        immediateUpdates: true,
        todayHighlight: true,
    });
</script>