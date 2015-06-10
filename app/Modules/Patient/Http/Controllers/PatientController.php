<?php namespace App\Modules\Patient\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Patient\Http\Requests\PatientRequest;
use App\Modules\Patient\Models\Patient;

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

		$genderLists = [
			'Male' => 'Male',
			'Female' => 'Female',
		];

		return view('Patient::Patient.create', compact('genderLists'));
	}

	public function store(PatientRequest $patientRequest) {

		$patient = new Patient;
		$patient->name = $patientRequest->get('name');
		$patient->gender = $patientRequest->get('gender');
		$patient->save();

		return redirect(route('patients.index'))
			->with('flash_success', 'New patient created successfully.');
	}

}
