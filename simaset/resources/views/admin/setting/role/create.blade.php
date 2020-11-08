@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
      <h4>Setting User Menu</h4>
    </div> --}}
        <div class="card-body operasional">
            <form method="POST" action="{{url()->current()}}">
                {{ csrf_field() }}
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if(isset($error))
                @foreach($error->getMessages() as $key => $message)
                @foreach ($message as $r)
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $r }}</strong>
                </div>
                @endforeach
                @endforeach
                @endif
                <div class="container-fluid">
                    <h4>Setting Role & Menu</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-5 mt-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label pr-0"><b>Role </b></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" name="role" id="role"
                                        placeholder="Role" value="{{isset($model) ? $model->role : ''}}">
                                    <span id="pesan" style="display: none"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>Akses Menu</h5>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group header-menu">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" class="checkedAll"><strong> Checked All</strong>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($menu as $row)
                    <div class="col-md-4">
                        <div class="form-group header-menu">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" id="menu-{{$row->id}}" name="menuDetail[]"
                                        data-id="{{$row->id}}" class="parent " value="{{$row->id}}"><strong>
                                        {{$row->title}}</strong>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        @foreach ($row->sub_menu2 as $rows)
                        <div class="form-group item-menu" style="margin-top: -10px;">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline ml-3">
                                    <input type="checkbox" id="menu-{{$rows->id}}" data-id="{{$row->id}}" class="child"
                                        name="menuDetail[]" value="{{$rows->id}}"> {{$rows->title}}
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                @if($model->menu)
                <script>
                    @foreach($model -> menu as $r)
                    $('#menu-{{$r->id_menu}}').prop('checked', true);
                    @endforeach
                </script>
                @endif

                <div class="modal-footer">
                    <a href="{{url('menu')}}" class="btn btn-secondary" role="button" aria-pressed="true"> <i
                            class="fa fa-arrow-left"></i> Batalkan</a>
                    <button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.header-menu').on('click', function () {
            var checked = $(this).find('.parent').is(":checked");
            if (checked) {
                checkAll($(this).siblings('.item-menu'), true);
            } else {
                checkAll($(this).siblings('.item-menu'), false);
            }
        });

        $('.item-menu').on('click', function () {
            var checked = $(this).find('.child').is(":checked");
            if (checked) {
                $(this).parent().find('.parent').prop('checked', true)
            }
        });

        $('.checkedAll').on('click', function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('.header-menu').parent().find('.parent').prop('checked', true)
                $('.item-menu').parent().find('.child').prop('checked', true)
            } else {
                $('.header-menu').parent().find('.parent').prop('checked', false)
                $('.item-menu').parent().find('.child').prop('checked', false)
            }
        });


        function checkAll(e, checked) {
            e.find('.child').prop('checked', checked);
        }
    });

</script>
@endsection
