<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('name', $patient->name, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('gender', $genderLists, $patient->gender, ['class' => 'form-control']) !!}
	</div>
</div>