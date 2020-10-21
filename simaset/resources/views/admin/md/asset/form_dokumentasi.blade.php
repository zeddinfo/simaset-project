<tr data-index-dokumentasi="{{$i}}">
    <input type="hidden" id="{{$name}}_{{$i}}_id" class="form-control " name="{{$name}}[{{$i}}][id]" placeholder=""
        value="{{ isset($model) ? $model->id : ''}}" data-id="id">
    <td>
        <input type="text" id="{{$name}}_{{$i}}_line_no" class="form-control" name="{{$name}}[{{$i}}][line_no]"
            placeholder="" value="{{isset($model) ? $model->line_no : ''}}" readonly required="" data-id="line_no"
            im-insert="true" style="width: 50px">
    </td>
    <td>
        <div class="custom-file">
            <div class="custom-file">
                <input type="file" class="custom-file-input form-control" id="{{$name}}_{{$i}}_customFile"
                    name="{{$name}}[{{$i}}][file]" data-id="file" value="{{isset($model) ? $model->file_name : ''}}"
                    im-insert="true">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </td>
    <td>
        <input type="text" id="{{$name}}_{{$i}}_keterangan" class="form-control" name="{{$name}}[{{$i}}][keterangan]"
            placeholder="" required="" value="{{isset($model) ? $model->keterangan : ''}}" data-id="keterangan"
            im-insert="true">
    </td>
    <td style="width: 25%;padding: 20px">
        <?php $path = url('storage/file/foto/'.$model->file_name);?>
        <img id="dokumentasi" src="{{$path}}" style="width: 150px">
    </td>
</tr>
<script>
    $('#{{$name}}_{{$i}}_customFile').on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
