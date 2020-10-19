<tr data-index-perizinan="{{$i}}">
    <input type="hidden" id="{{$name}}_{{$i}}_id" class="form-control " name="{{$name}}[{{$i}}][id]" placeholder="" readonly value="{{ isset($model) ? $model->id : ''}}" data-id="id">
    <td>
        <input type="text" id="{{$name}}_{{$i}}_line_no" class="form-control" name="{{$name}}[{{$i}}][line_no]" placeholder="" value="{{isset($model) ? $model->line_no : ''}}" readonly required="" data-id="line_no" im-insert="true" style="width: 75px">
    </td>
    <td>
        <select id="inputLegalitas" class="form-control"
        id="{{$name}}_{{$i}}_legalitas" name="{{$name}}_[{{$i}}][legalitas]">
        <option value="">- Pilih -</option>
        <option value="SHM">SHM</option>
        <option value="SHBG">SHBG</option>
    </select>
    </td>
    <td>
        <input type="text" id="{{$name}}_{{$i}}_nomor" class="form-control numeric" name="{{$name}}[{{$i}}][nomor]" placeholder=""  required="" data-id="nomor" im-insert="true">
    </td>
    <td>
        <input type="text" id="{{$name}}_{{$i}}_tgl-izin" class="form-control" name="{{$name}}[{{$i}}][tgl-izin]" placeholder="" required="" data-id="tgl-izin" im-insert="true">
    </td>
</tr>

<script>
    $('#{{$name}}_{{$i}}_tgl-izin').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
        immediateUpdates: true,
        todayBtn: true,
        todayHighlight: true
    }).datepicker("setDate", "0");
</script>