@php
	if (session()->has('username') || session()->has('code'))
	{
		session()->pull('username');
		session()->pull('code');

	}
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Admin Check</h3></div>
			<div class="panel-body">

				<form class="form-inline" role="form" method="post" action="{{ route('goToAdmin') }}">
					@csrf 
					<div class="form-group">
						<label class="sr-only">User Name</label>
						<input name="username" type="text" class="form-control" id="" placeholder="User Name">
					</div>

					<div class="form-group m-l-10">
						<label class="sr-only" for="">Admin Code</label>
						<input name="code" type="password" class="form-control" id="" placeholder="Admin Code">
					</div>
					<button type="submit" class="btn btn-success waves-effect waves-light m-l-10">Let's Go</button>
				</form>

			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->

</div>
