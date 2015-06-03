<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller {

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

		return view('profile', compact(
			'user'
		));
	}

	public function updateProfile(ProfileRequest $request)
	{
		$user = Auth::user();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->save();

		return redirect(action('ProfileController@index'))
			->with('flash_success', 'Profile updated successfully.');
	}


}
