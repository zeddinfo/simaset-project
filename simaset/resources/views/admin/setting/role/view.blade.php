@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
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
				<div class="container-fluid">
				<h4>Detail Menu & Role {{$model->role}}</h4>
					<hr>
					<div class="row">
						<div class="col-md-6 mb-5 mt-5">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label pr-0"><b>Role </b></label>
								<div class="col-sm-8">
									<input type="text" disabled class="form-control" name="role" id="role" placeholder="Role" value="{{isset($model) ? $model->role : ''}}">
								</div>
							</div>
						</div>
					</div>
					<hr>
					<h5>Akses Menu</h5>
				</div>
				<br>

				<div class="row">
					@foreach ($menu as $row)
						<div class="col-md-4">
							<div class="form-group">
								<div class="mt-checkbox-list">
									<label class="mt-checkbox mt-checkbox-outline">
										<input type="checkbox" disabled id="menu-{{$row->id}}" name="menuDetail[]" class="p"
											value="{{$row->id}}"><strong> {{$row->title}}</strong>
										<span></span>
									</label>
								</div>
							</div>
							@foreach ($row->sub_menu2 as $rows)
							<div class="form-group" style="margin-top: -10px;">
								<div class="mt-checkbox-list">
									<label class="mt-checkbox mt-checkbox-outline ml-3">
										<input type="checkbox" disabled id="menu-{{$rows->id}}" class="{{$row->class}}"
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
						@foreach($model->menu as $r)
							$('#menu-{{$r->id_menu}}').prop('checked', true);
						@endforeach
					</script>
				@endif
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

@endsection

@section('script')

<script>
	$(document).ready(function () {
		
	});
</script>
	
@endsection