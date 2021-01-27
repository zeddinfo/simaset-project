@extends('layouts.app')

@section('content')
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

    <div class="section-body">
    <h2 class="section-title">{{$title}}</h2>

        <div class="modal fade" tabindex="-1" role="dialog" id="modal-kategori">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{url('/setting/role/create')}}" class="btn btn-info active float-right" role="button"
                        aria-pressed="true"> <i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-role">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Role</th>
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
            url: `{{url('setting/role/delete/${id}')}}`,
            type: 'POST',
            success: function (res) {
                toastr.info('User berhasil dihapus');
                $('#table-role').DataTable().ajax.reload();
                
            }
        });
    } else {
        return
    }
})
}


        $(document).ready(function(){
            $('#table-role').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: {
                    url: '{{url("setting/role/listRole")}}',
                    type: 'GET',
                    dataType: 'JSON'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'role', name: 'role'},
                    {data: 'action', name: 'action'}
                ],
                order: [[0, 'asc']]
            });
        });
    </script>
@endsection
