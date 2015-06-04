<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\PasswordRequest;

class UpdatePasswordController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$user = Auth::user();

		return view('UpdatePassword', compact(
			'user'
		));
	}

	public function updatePassword(PasswordRequest $request)
	{
		$user = Auth::user();
		$user->currentPassword = $request->get('currentPassword');
		$user->newPassword = $request->get('newPassword');
		$user->confirmPassword = $request->get('confirmPassword');
		$user->save();

		return redirect(action('UpdatePasswordController@index'))
			->with('flash_success', 'Password updated successfully.');
	}


}
