<tr data-index-dokumentasi="{{$i}}">
    <input type="hidden" id="{{$name}}_{{$i}}_id" class="form-control " name="{{$name}}[{{$i}}][id]" placeholder="" value="{{ isset($model) ? $model->id : ''}}" data-id="id">
    <td>
        <input type="text" id="{{$name}}_{{$i}}_line_no" class="form-control" name="{{$name}}[{{$i}}][line_no]" placeholder="" value="{{isset($model) ? $model->line_no : ''}}"  readonly required="" data-id="line_no" im-insert="true" style="width: 75px">
    </td>
    <td>
        <div class="custom-file">
            <input type="file" name="{{$name}}_[{{$i}}][foto]" data-id="nomor" class="custom-file-input"
            id="{{$name}}_{{$i}}_customFile" style="width: 150px">
            <label class="custom-file-label" for="customFile">Pilih
                Foto</label>
        </div>
    </td>
    <td>
        <input type="text" id="{{$name}}_{{$i}}_keterangan" class="form-control" name="{{$name}}[{{$i}}][keterangan]" placeholder="" required="" data-id="keterangan" im-insert="true">
    </td>
</tr>