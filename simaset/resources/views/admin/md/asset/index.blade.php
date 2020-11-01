@extends('layouts.app')

@section('content')
<style>
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
        background-color: #6777ef;
    }

    .nav-tabs .nav-item .nav-link {
        color: white;
    }

    .modal-content {
        margin: 2px auto;
        z-index: 1100 !important;
    }

    .dataTables_filter {
        float: right;
    }

    .table-asset_length {
        float: left;
    }
    img.thumbnail {
        vertical-align: middle;
        border-style: none;
        width: 75px;
        border: 1px solid black;
        border-radius: 5px;
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

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-list" role="tab"
                                aria-controls="tab-list" aria-selected="true"><i class="fas fa-align-justify"></i> List
                                Asset</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-dijual" role="tab"
                                aria-controls="tab-dijual" aria-selected="true"><i class="far fa-check-circle"></i>
                                Dijual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-disewa" role="tab"
                                aria-controls="tab-disewa" aria-selected="true"><i class="fas fa-donate"></i> Disewa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-dijual-disewa" role="tab"
                                aria-controls="tab-dijual-disewa" aria-selected="true"><i
                                    class="fas fa-money-bill-wave-alt"></i> Dijual/Disewa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-maintenance" role="tab"
                                aria-controls="tab-maintenance" aria-selected="true"><i class="fas fa-hammer"></i>
                                Maintenance</a>
                        </li>
                    </ul>
                    <div class="card-header">
                        <a href="{{url('/md/asset/create')}}" class="btn btn-info active float-right" role="button"
                            aria-pressed="true"> <i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-asset">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Asset</th>
                                        <th>Alamat</th>
                                        <th>LT(M<sup>2</sup>)</th>
                                        <th>LB(M<sup>2</sup>)</th>
                                        <th>Ukuran(L x P)</th>
                                        <th>Status</th>
                                        <th>Harga</th>
                                        <th>Thumbnail</th>
                                        <th>Opsi</th>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">History Proses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-history">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Waktu</th>
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
            text: "Jika iya maka data akan dihapus permanen !",
            imageUrl: '{{url("assets/icons/remove.svg")}}',
            imageWidth: 400,
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
                    url: `{{url('md/asset/delete/${id}')}}`,
                    type: 'POST',
                    success: function (res) {
                        toastr.info(res.message);
                        $("#table-asset").DataTable().ajax.reload();
                    }
                });
            } else {
                return
            }
        })
    }

    function loadHistory(id) {
        var table = $('#table-history').DataTable({
            processing: true,
            serverside: true,
            responsive: true,

            ajax: {
                url: '{{url("api/logHistory")}}',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    id: id
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'created_at',
                    name: 'creared_at'
                }
            ],
            order: [
                [0, 'asc']
            ],

        });
    }

    $(document).ready(function () {
        $('#table-asset_filter').addClass('float-right');
        var table = $('#table-asset').DataTable({
            processing: true,
            serverside: true,
            responsive: true,
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            ajax: {
                url: "{{url('api/asset/list')}}",
                type: "GET",
                dataType: "JSON"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'namaasset',
                    name: 'namaasset'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'lt',
                    name: 'lt'
                },
                {
                    data: 'lb',
                    name: 'lb'
                },
                {
                    data: 'ukuran',
                    name: 'ukuran'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta){
                        return "<img src="+data+" class='thumbnail'/>";
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    width: '25%'
                }
            ],
            order: [
                [0, 'asc']
            ]
        });



        $('#table-asset').on('click', 'tr td:eq(1)', function () {
            var data = table.row(this).data();
            var id = data.id;
            $('#exampleModal').modal('show');
            $('.modal-backdrop').css('display', 'none');
            $('#table-history').DataTable().destroy();
            loadHistory(id);

        });
    });

</script>
@endsection
