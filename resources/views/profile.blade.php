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

					{!! Form::open(['class' => 'form-horizontal', 'method' => 'put', 'action' => 'ProfileController@updateProfile']) !!}

						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							{!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
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