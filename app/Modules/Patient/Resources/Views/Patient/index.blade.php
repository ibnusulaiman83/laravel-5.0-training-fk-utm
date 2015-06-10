@extends('app')

@section('page-style')
	{!! Html::style('plugins/datatables/jquery.dataTables.min.css') !!}
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Patients List</div>
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

			    <?php $dataTable = Datatable::table()
	->addColumn('Id', 'Name', 'Gender') // these are the column headings to be shown
	->setUrl(route('patients.lists')) // this is the route where data will be retrieved
	->noScript()?>

					{!! $dataTable->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page-script')
	{!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
	{!! $dataTable->script() !!}
@endsection