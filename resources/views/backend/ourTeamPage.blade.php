@extends('layouts/admin')
@section('adminContent')

@php
use App\Models\OurTeam;
$ourTeam = OurTeam::select('*')->get();
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="" class="btn btn-success" data-toggle="modal" data-target="#commonAddModel"><i class="fas fa-plus"></i> Add New</a>
				{{-- Toste Start--}}

			<div style="display: none;" id="successTost" class="alert alert-success">Your Ordered Task Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			@if (session("success"))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ session('success') }}
				</div>
			@endif

			{{-- Toste End--}}
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12">
							<table id="datatable" class="commonTable table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156px;">SL No.</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Team Member Image</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Team Member Name</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Team Member Position</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Team Member Facebook</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Team Member LinkedIn</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 110px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($ourTeam as $item)
								<tr role="row" class="odd" id="commonId{{ $item->tmId }}">
									<td>{{ $loop->index }}</td>
									<td><img width="30%" src="{{ Storage::url($item->tmPho)}}" alt="image"></td>
									<td>{{ $item->tmName }}</td>
									<td>{{ $item->tmPosition }}</td>
									<td>{{ $item->tmFbLink }}</td>
									<td>{{ $item->tmLnLink }}</td>
									<td class="text-left py-0 align-middle">
										<div class="btn-group btn-group-sm text-left">
											<a onclick="editCommon({{ $item->tmId }})" href="javascript:voud(0)" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

											<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
											<button class="btn btn-danger commonDelete" data-id="{{ $item->tmId }}"><i class="fa fa-trash-o"></i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

</div>

<!-- Modal Add Service -->
<div class="modal fade" id="commonAddModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Service</h5>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" action="{{ route('addTeamMember') }}" method="POST" id="commonAddForm">
					@csrf

					<div class="form-group">

							<label for="langName">Team Member Image</label>
							<input id="commonImage" name="commonImage" type="file" class="form-control" placeholder="Enter A Service Percentese">
						</div>

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Team Member Name</label>
							<input id="commonName" name="commonName"  type="text" class="form-control" placeholder="Enter A Service Name">
						</div>

						<div class="form-group">

							<label for="langName">Team Member Position</label>
							<input id="commonPosition" name="commonPosition" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Team Member Facebook Link</label>
							<input id="commonFbLink" name="commonFbLink" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Team Member LinkedIn Link</label>
							<input id="commonLnLink" name="commonLnLink" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>
						
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Add Team Member </button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Update Service -->
<div class="modal fade" id="commonUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Update Service</h5>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" action="{{ route('UpdateTeam') }}" method="POST" id="updateCommonAddForm">
					@csrf

					<div class="form-group">

							<label for="langName">Team Member Image</label>
							<input id="updateCommonImage" name="updateCommonImage" type="file" class="form-control" placeholder="Enter A Service Percentese">
						</div>

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Team Member Name</label>
							<input id="updateCommonName" name="updateCommonName"  type="text" class="form-control" placeholder="Enter A Service Name">
							<input id="updateCommonId" name="updateCommonId" type="hidden">
						</div>

						<div class="form-group">

							<label for="langName">Team Member Position</label>
							<input id="updateCommonPosition" name="updateCommonPosition" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Team Member Facebook Link</label>
							<input id="updateCommonFbLink" name="updateCommonFbLink" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Team Member LinkedIn Link</label>
							<input id="updateCommonLnLink" name="updateCommonLnLink" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>
						
					</div>

						
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Update Team Member </button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('extraJS')

<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();
	} );
</script>

@include('backend.myAjax.ajaxOurTeam')
@endsection