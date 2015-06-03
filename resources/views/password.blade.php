@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					@if (Session::get('flash_success'))
						<div class="alert alert-success fade in m-b-15">
							<strong>Success!</strong>
							{!! Session::get('flash_success') !!}
							<span class="close" data-dismiss="alert">×</span>
						</div>
					@endif

					{!! Form::open(['class' => 'form-horizontal', 'method' => 'put', 'action' => 'ProfileController@updatePassword']) !!}

						<div class="form-group">
							{!! Form::label('old_password', 'Old Password', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password', 'old_password', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('new_password', 'New Password', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('new_password_confirmation', 'New Password Confirmation', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection