@if (count($errors) > 0)
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

{!! Form::open(['class' => 'form-horizontal', 'method' => 'post', 'route' => 'patients.store']) !!}

{!! Form::label('name') !!}
{!! Form::text('name') !!}

{!! Form::label('gender') !!}
{!! Form::select('gender', $genderLists, 'Male') !!}

{!! Form::submit() !!}

{!! Form::close() !!}