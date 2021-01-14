@extends('layouts.app')

@section('content')

<style>
    .modal-backdrop{
        display: none;
    }
</style>
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>DataTables</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">DataTables</div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-user">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pengisian User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="frm-modal">
                        <div class="form-group">
                            <label><b>User</b></label>
                            <input type="text" class="form-control" name="user" id="nama" value={{isset($model) ? $model->namauser : '' }}>
                        </div>
                        <div class="form-group">
                            <label><b>Username</b></label>
                            <input type="text" class="form-control" name="username" id="username" value={{isset($model) ? $model->username : '' }}>
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" class="form-control" name="password" id="password" value={{isset($model) ? $model->password : '' }}>
                        </div>
                        <!-- <div class="form-group">
                            <label><b>User</b></label>
                            <select class="form-control" id="user" name="user" placeholder="Silahkan Pilih User">
                                <option> -- PILIH USER --</option>
                                @foreach ($user as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label><b>Role</b></label>
                            <select class="form-control" id="role" name="role">
                                <option> -- PILIH ROLE --</option>
                                @foreach ($role as $s)
                                <option value="{{$s->id}}">{{$s->role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick=simpan()>Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{$title}}</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn btn-info btn-tambah float-right" id="btn-tambah"><i class="fas fa-plus"></i>
                            Tambah User
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-user">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>


function hapus(id) {

swal({
    title: 'Apakah Anda Yakin?',
    
    imageUrl: '{{url("assets/icons/remove.svg")}}',
    imageWidth: 200,
    imageHeight: 200,
    showCancelButton: true,
    confirmButtonColor: '#FF0000',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
}, function (isConfirm) {
    if (isConfirm) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: `{{url('setting/user/delete/${id}')}}`,
            type: 'POST',
            success: function (res) {
                toastr.info('User berhasil dihapus');
                $('#table-user').DataTable().ajax.reload();
                
            }
        });
    } else {
        return
    }
})
}


    function load_data() {
        $('#table-user').DataTable({
            processing: true,
            serverside: true,
            ajax: {
                url: "{{url('api/user/list')}}",
                dataType: 'JSON',
                type: 'GET'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    width: '15%'
                }
            ],
            order: [
                [0, 'asc']
            ],

        });
    }

    function simpan() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $('#id').val();

        if (id == '' || id == undefined) {
            $.ajax({
                url: '{{url("setting/user/create")}}',
                data: $('#frm-modal').serialize(),
                dataType: 'JSON',
                type: 'POST',
                success: function (res) {
                    $('#modal-user').modal('hide');
                    toastr.success(res);
                    $('#table-user').DataTable().ajax.reload();
                }
            });
        } else {
            $.ajax({
                url: `{{url('setting/user/update/${id}')}}`,
                data: $('#frm-modal').serialize(),
                dataType: 'JSON',
                type: 'POST',
                success: function(res){
                    $('#modal-user').modal('hide');
                    toastr.success(res);
                    $('#table-user').DataTable().ajax.reload();
                }
            });
        }
    }

    function edit(id) {
        $('.modal-backdrop').css('display', 'none');
        $.ajax({
            url: `{{url('api/get-user/${id}')}}`,
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                var user = `<option value="${res.nama_user.id}" selected="selected">${res.nama_user.name}</option>`;
                var role = `<option value="${res.nama_role.id}" selected="selected">${res.nama_role.role}</option>`;
                $('#user').append(user);
                $('#role').append(role);
                $('#nama').val(res.nama_user.name);
                $('#username').val(res.nama_user.username);
                $('#password').val(res.nama_user.password);
                $('#id').val(res.id);
                
                $('#modal-user').modal('show');
            }
        })
    }

    $(document).ready(function () {
        load_data();
        $('#btn-tambah').click(function () {
            $('#modal-user').modal('show');
            $('.modal-backdrop').css('display', 'none');
        });

    });

</script>
@endsection
