<?php namespace App\Modules\Patient\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Patient\Http\Requests\PatientRequest;
use App\Modules\Patient\Models\Patient;
use Datatable;
use Html;

class PatientController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {

		$patients = Patient::all();

		return view('Patient::Patient.index', compact('patients'));
	}

	public function create() {

		$patient = new Patient;
		$patient->name = 'New User';

		$genderLists = [
			'Male' => 'Male',
			'Female' => 'Female',
		];

		return view('Patient::Patient.create', compact('patient', 'genderLists'));
	}

	public function store(PatientRequest $patientRequest) {

		$patient = new Patient;
		$patient->name = $patientRequest->get('name');
		$patient->gender = $patientRequest->get('gender');
		$patient->save();

		return redirect(route('patients.index'))
			->with('flash_success', 'New patient created successfully.');
	}

	public function edit($id) {

		$patient = Patient::find($id);

		$genderLists = [
			'Male' => 'Male',
			'Female' => 'Female',
		];

		return view('Patient::Patient.edit', compact('patient', 'genderLists'));
	}

	public function update($id, PatientRequest $patientRequest) {

		$patient = Patient::find($id);
		$patient->name = $patientRequest->get('name');
		$patient->gender = $patientRequest->get('gender');
		$patient->save();

		return redirect(route('patients.edit', $id))
			->with('flash_success', 'Patient updated successfully.');
	}

	public function lists() {

		return Datatable::collection(Patient::all(array('id', 'name', 'gender')))
			->showColumns('id', 'name', 'gender')
			->addColumn('actions', function ($patient) {
				return Html::link(route('patients.edit', $patient->id), 'Detail', ['class' => 'btn btn-xs btn-primary']);
			})
			->searchColumns('name', 'gender')
			->orderColumns('id', 'name', 'gender')
			->make();
	}

}
