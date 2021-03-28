@extends('layouts/admin')
@section('adminContent')

@php
	use App\Models\Contact;
	$contact = Contact::select('*')->first();
@endphp

@if ($contact)
	<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div style="display: none;" id="successTost" class="alert alert-success">Your Ordered Task Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			<div class="panel-body">
				<div class=" form">
					<form class="cmxform form-horizontal tasi-form" id="updateCommonForm" method="POST" action="" novalidate="novalidate">
						@csrf

						<input type="hidden" id="updateCommonId" value="{{ $contact->contId }}">
						
						<div class="form-group ">
							<label for="ccomment" class="control-label col-lg-2">Address</label>
							<div class="col-lg-10">
								<textarea class="form-control " id="updateCommonAdd" name="updateCommonAdd" required="" aria-required="true">{{ $contact->contAdd }}</textarea>
							</div>
						</div>

						<div class="form-group ">
							<label for="cemail" class="control-label col-lg-2">E-Mail</label>
							<div class="col-lg-10">
								<input class="form-control " id="updateCommonEmail" type="email" name="updateCommonEmail" required="" aria-required="true" value="{{ $contact->contEmail }}">
							</div>
						</div>
						<div class="form-group ">
							<label for="curl" class="control-label col-lg-2">Phone</label>
							<div class="col-lg-10">
								<input value="{{ $contact->contPho }}" class="form-control " id="updateCommonPhone" type="text" name="commonPhone">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Update Personal Info</button>
							</div>
						</div>
					</form>
				</div> <!-- .form -->
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->

</div>
@else
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Form validations</h3></div>
			<div class="panel-body">
				<div class=" form">
					<form class="cmxform form-horizontal tasi-form" id="commonAddForm" method="post" action="{{ route('addContact') }}" novalidate="novalidate">
						@csrf
						
						<div class="form-group ">
							<label for="ccomment" class="control-label col-lg-2">Address</label>
							<div class="col-lg-10">
								<textarea class="form-control " id="commonAdd" name="commonAdd" required="" aria-required="true"></textarea>
							</div>
						</div>

						<div class="form-group ">
							<label for="cemail" class="control-label col-lg-2">E-Mail</label>
							<div class="col-lg-10">
								<input class="form-control " id="commonEmail" type="email" name="commonEmail" required="" aria-required="true">
							</div>
						</div>
						<div class="form-group ">
							<label for="curl" class="control-label col-lg-2">Phone</label>
							<div class="col-lg-10">
								<input class="form-control " id="commonPhone" type="text" name="commonPhone">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Add Contact Info</button>
							</div>
						</div>
					</form>
				</div> <!-- .form -->
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->

</div>
@endif

@endsection

@section('extraJS')

@include('backend.myAjax.ajaxContact')
@endsection