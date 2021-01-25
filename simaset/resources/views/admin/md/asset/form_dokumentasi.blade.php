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
                    im-insert="true" onChange="previewImage()">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </td>
    <td>
        <input type="text" id="{{$name}}_{{$i}}_keterangan" class="form-control" name="{{$name}}[{{$i}}][keterangan]"
            placeholder="" required="" value="{{isset($model) ? $model->keterangan : ''}}" data-id="keterangan"
            im-insert="true">
    </td>
    <td style="width: 40%;padding: 30px">
        @php 
        $path = url('/storage/file/foto/'.$model->file_name);
        $defaultImg = url('/assets/icons/image.png');
        @endphp
       <!-- sementara di komen -->
        <!-- <img id="dokumentasi" src="{{isset($model->dokumentasi) ? $path : $defaultImg}}" style="width: 100px"> -->
        <img id="{{$name}}_{{$i}}_image-preview" src="{{isset($model->dokumentasi) ? isset($model->dokumentasi) : ''}}" style="width: 100px"/>
        
        <!-- <img id="{{$name}}_{{$i}}_image-preview" alt="image-preview" src="{{isset($model->dokumentasi) ? isset($model->dokumentasi) : ''}}" style="width: 100px"/> -->
    </td>
    <td>
    <button type="button" class="btn btn-danger" id="" style="" onclick="removeLine({{$i}})"><i
                class="fa fa-times"></i> </button> 
    </td>
    <td>
    <!-- image yang ter upload pak woy -->
   
    </td>
</tr>

<script>

    $('#{{$name}}_{{$i}}_customFile').on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function previewImage(){
        // $("#{{$name}}_{{$i}}_image-preview").css('display', 'block');
        var imgSource = $("#{{$name}}_{{$i}}_customFile");
        var fileReader = new FileReader();
        // console.log(imgSource[0].files[0]);
        fileReader.onload = function(e){
            $("#{{$name}}_{{$i}}_image-preview").attr('src', fileReader.result);
        }
        fileReader.readAsDataURL( $("#{{$name}}_{{$i}}_customFile")[0].files[0]);
            

    }

</script>

