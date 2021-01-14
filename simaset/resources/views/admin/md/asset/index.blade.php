@extends('layouts.app')

@section('content')
<style>
/* td{

            width:10px;
            text-align: left;
} */
/* 
    table{
    margin: 0 auto;
    width: 100%;
    clear: both;
    border-collapse: collapse;
    table-layout: fixed; 
    word-wrap:break-word; 
    } */
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
        width: 60px;
        height: 60px;
        border: 1px solid black;
        border-radius: 5px;
    }

</style>
<!-- Main Content -->
<section class="section">
    <div class="section-header">
            <h1>SIMASET</h1>
            <div class="section-header-breadcrumb">
                <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div> -->
                <div class="breadcrumb-item">Data Aset</div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 card">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div> -->
    
    
    <div class="section-body">
        {{-- {{$workflow}} --}}
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
                                    class="fas fa-money-bill-wave-alt"></i> DijualatauDisewa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-1" data-toggle="tab" href="#tab-maintenance" role="tab"
                                aria-controls="tab-maintenance" aria-selected="true"><i class="fas fa-hammer"></i>
                                Maintenance</a>
                        </li>
                    </ul>

                    <div class="card-body">
                        
                            <div class="tab-content" id="myTabContent" style="padding: 10px">
                                <div class="tab-pane fade show active" id="tab-list" role="tabpanel"
                                    aria-labelledby="tab-1">
                                
                                        <div class="table-responsive">
                                        @if (Session::get('role') == 'admin' || Session::get('role') == 'operasional')
                        <a href="{{url("/md/asset/create")}}" class="btn btn-info active float-left" role="button"
                        > <i class="fa fa-plus"></i> Tambah Data</a>
                        @endif
                                            <table class="table table-striped table-bordered display" id="table-asset" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Nama Asset</th>
                                                        <th>Alamat</th>
                                                        <th>LT(M<sup>2</sup>)</th>
                                                        <th>LB(M<sup>2</sup>)</th>
                                                        <th>Ukuran</th>
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
                                    
                                    <div class="tab-pane fade show" id="tab-dijual" role="tabpanel"
                                    aria-labelledby="tab-1">
                                
                                        <div class="table-responsive">
                                        @if (Session::get('role') == 'admin' || Session::get('role') == 'operasional')
                        <a href="{{url("/md/asset/create")}}" class="btn btn-info active float-left" role="button"
                        > <i class="fa fa-plus"></i> Tambah Data</a>
                        @endif
                                            <table class="table table-striped table-bordered" id="table-jual" cellspacing="0" width="100%"> 
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <td>Nama Asset </th>
                                                        <th>Alamat</th>
                                                        <th>LT(M<sup>2</sup>)</th>
                                                        <th>LB(M<sup>2</sup>)</th>
                                                        <th>Ukuran</th>
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

                                    <div class="tab-pane fade show" id="tab-disewa" role="tabpanel"
                                    aria-labelledby="tab-1">
                                    
                                
                                        <div class="table-responsive">
                                        @if (Session::get('role') == 'admin' || Session::get('role') == 'operasional')
                        <a href="{{url("/md/asset/create")}}" class="btn btn-info active float-left" role="button"
                        > <i class="fa fa-plus"></i> Tambah Data</a>
                        @endif
                                            <table class="table table-striped table-bordered" id="table-sewa" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Nama Asset</th>
                                                        <th>Alamat</th>
                                                        <th>LT(M<sup>2</sup>)</th>
                                                        <th>LB(M<sup>2</sup>)</th>
                                                        <th>Ukuran</th>
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

                                    <div class="tab-pane fade show" id="tab-dijual-disewa" role="tabpanel"
                                    aria-labelledby="tab-1">
                                
                                        <div class="table-responsive">
                                        @if (Session::get('role') == 'admin' || Session::get('role') == 'operasional')
                        <a href="{{url("/md/asset/create")}}" class="btn btn-info active float-left" role="button"
                        > <i class="fa fa-plus"></i> Tambah Data</a>
                        @endif
                                            <table class="table table-striped table-bordered" id="table-jual-sewa" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Nama Asset</th>
                                                        <th>Alamat</th>
                                                        <th >LT(M<sup>2</sup>)</th>
                                                        <th>LB(M<sup>2</sup>)</th>
                                                        <th>Ukuran</th>
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

                                    <div class="tab-pane fade show " id="tab-maintenance" role="tabpanel"
                                    aria-labelledby="tab-1">
                                
                                        <div class="table-responsive">
                                        @if (Session::get('role') == 'admin' || Session::get('role') == 'operasional')
                        <a href="{{url("/md/asset/create")}}" class="btn btn-info active float-left" role="button"
                        > <i class="fa fa-plus"></i> Tambah Data</a>
                        @endif
                                            <table class="table table-striped table-bordered" id="table-maintenance" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>id</th></th>
                                                        <th>Nama Asset</th>
                                                        <th>Alamat</th>
                                                        <th>LT(M<sup>2</sup>)</th>
                                                        <th>LB(M<sup>2</sup>)</th>
                                                        <th>Ukuran</th>
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
    $(document).ready(function(){
        $.ajax({
            url: "{{url('api/chart')}}",
            type: 'GET',
            dataType: 'JSON',
            success: function(res){
                console.log(res);
                var label = [];
                var total = [];
                for (var i in res){
                    label.push(res[i].status);
                    total.push(res[i].total);
                }
                Chart.defaults.global.legend.labels.usePointStyle = true;
    var ctx = document.getElementById("chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
			    labels: label,
    datasets: [
        {
            data: total,
            backgroundColor: [
                "#FF1493",
                "#00BFFF",
                "#84FF63",
                "#FFFF00",
            ]
        }]
			},
			options: {
                legend: {
                    position: 'bottom',
                    align: 'center',
                    display: true,
                }
			}
		});

            }
        })
    });



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
                    url: `{{url('md/asset/delete/${id}')}}`,
                    type: 'POST',
                    success: function (res) {
                        toastr.info(res.message);
                        $("#table-asset").DataTable().ajax.reload();
                        $("#table-sewa").DataTable().ajax.reload();
                        $("#table-jual").DataTable().ajax.reload();
                        $("#table-jual-sewa").DataTable().ajax.reload();
                        $("#table-maintenance").DataTable().ajax.reload();
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
            
            ajax: {
                url: "{{url('api/asset/list')}}",
                type: "GET",
                data: {
                    type: 'all',
                },
                dataType: "JSON"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'namaasset',
                    name: 'namaasset',
                    width: '20%'
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                    width: '25%'
                },
                {
                    data: 'lt',
                    name: 'lt',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'lb',
                    name: 'lb',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'ukuran',
                    name: 'ukuran',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'harga',
                    name: 'harga',
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' ),
                    width: '25%'
                    // render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        // return "<img src=" + data + " class='thumbnail'/>";
                        return "<a href="+data+" target='_blank'> <img src="+data+" class='thumbnail'/></a>"
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    width:'30%'
                }
            ],
            order: [
                [0, 'desc']
            ]
        });


        
        $('#table-asset_filter').addClass('float-right');
        var table = $('#table-sewa').DataTable({
            bAutoWidth: false,
            processing: true,
            serverside: true,
            responsive: true,
            lengthChange: false,
            
            ajax: {
                url: "{{url('api/asset/list')}}",
                type: "GET",
                data: {
                    type: 'sewa',
                },
                dataType: "JSON"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'namaasset',
                    name: 'namaasset',
                    width: '20%'
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                    width: '25%'
                },
                {
                    data: 'lt',
                    name: 'lt',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'lb',
                    name: 'lb',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'ukuran',
                    name: 'ukuran',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'status',
                    name: 'status',
                    
                },
                {
                    data: 'harga',
                    name: 'harga',
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' ),
                    width: '25%'
                    // render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        // return "<img src=" + data + " class='thumbnail'/>";
                        return "<a href="+data+" target='_blank'> <img src="+data+" class='thumbnail'/></a>"
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    width:'30%'
                }
            ],
            order: [
                [0, 'desc']
            ]
        });
        

        $('#table-jual').DataTable({
            bAutoWidth: false,
            processing: true,
            serverside: true,
            responsive: true,
            lengthChange: false,
            ajax: {
                url: "{{url('api/asset/list')}}",
                type: "GET",
                data: {
                    type: 'jual'
                },
                dataType: "JSON"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'namaasset',
                    name: 'namaasset',
                    width: '20%'
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                    width: '25%'
                },
                {
                    data: 'lt',
                    name: 'lt',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'lb',
                    name: 'lb',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'ukuran',
                    name: 'ukuran',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'harga',
                    name: 'harga',
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' ),
                    width: '25%'
                    // render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        // return "<img src=" + data + " class='thumbnail'/>";
                        return "<a href="+data+" target='_blank'> <img src="+data+" class='thumbnail'/></a>"
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    width:'30%'
                }
            ],
            order: [
                [0, 'desc']
            ]
        });

        $('#table-jual-sewa').DataTable({
            bAutoWidth: false,
            processing: true,
            serverside: true,
            responsive: true,
            lengthChange: false,
            ajax: {
                url: "{{url('api/asset/list')}}",
                type: "GET",
                data: {
                    type: 'jual-sewa'
                },
                dataType: "JSON"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'namaasset',
                    name: 'namaasset',
                    width: '20%'
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                    width: '25%'
                },
                {
                    data: 'lt',
                    name: 'lt',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'lb',
                    name: 'lb',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'ukuran',
                    name: 'ukuran',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'harga',
                    name: 'harga',
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' ),
                    width: '25%'
                    // render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        // return "<img src=" + data + " class='thumbnail'/>";
                        return "<a href="+data+" target='_blank'> <img src="+data+" class='thumbnail'/></a>"
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    width:'30%'
                }
            ],
            order: [
                [0, 'desc']
            ]
        });

        $('#table-maintenance').DataTable({
            bAutoWidth: false,
            processing: true,
            serverside: true,
            responsive: true,
            lengthChange: false,
            ajax: {
                url: "{{url('api/asset/list')}}",
                type: "GET",
                data: {
                    type: 'maintenance'
                },
                dataType: "JSON"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'namaasset',
                    name: 'namaasset',
                    width: '20%'
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                    width: '25%'
                },
                {
                    data: 'lt',
                    name: 'lt',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'lb',
                    name: 'lb',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'ukuran',
                    name: 'ukuran',
                    render: $.fn.dataTable.render.number( '.', ',', 0)
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'harga',
                    name: 'harga',
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' ),
                    width: '25%'
                    // render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        // return "<img src=" + data + " class='thumbnail'/>";
                        return "<a href="+data+" target='_blank'> <img src="+data+" class='thumbnail'/></a>"
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    width:'30%'
                }
            ],
            order: [
                [0, 'desc']
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