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
        <h2 class="section-title">DataTables</h2>
        <p class="section-lead">
            We use 'DataTables' made by @SpryMedia. You can check the full documentation <a
                href="https://datatables.net/">here</a>.
        </p>

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
                        <div class="btn btn-info btn-tambah float-right" id="btn-tambah"><i class="fas fa-plus"></i> Tambah Data
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-kategori">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Slug</th>
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

@section('script')
<script>
    $(document).ready(function(){
        $("#table-kategori").dataTable({
            processing: true,
            serverside: true,
            responsive: true,
            ajax: {
                url: '{{url("api/kategori/list")}}',
                type: 'GET',
                dataType: 'JSON'
            },
            columns: [{
					data: 'name',
					name: 'name',
					width: "30%"
				},
				{
					data: 'slug',
					name: 'slug',
					width: "30%"
				},	
				{
					data: 'action',
					name: 'action',
					width: "20%"
				}
			],
        });
    });
</script> 
@endsection

@endsection
