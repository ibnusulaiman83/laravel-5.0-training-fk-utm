@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

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

{!! Form::open(['class' => 'form-horizontal', 'method' => 'put', 'action' => 'UpdatePasswordController@updatePassword']) !!}


						<div class="form-group">
							{!! Form::label('currentPassword', 'Password', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password','currentPassword', $user->currentPassword, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('newPassword', 'New Password', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password','newPassword', $user->newPassword, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('confirmPassword', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password','confirmPassword', $user->confirmPassword, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Send Password Reset Link
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
