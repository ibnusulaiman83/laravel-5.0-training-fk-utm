@if (count($errors) > 0)
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@if (Session::get('flash_success'))
	<strong>Success!</strong>
	{!! Session::get('flash_success') !!}
@endif

<ul>
	@foreach ($patients as $patient)
		<li> {{ $patient->name }} </li>
	@endforeach
</ul>