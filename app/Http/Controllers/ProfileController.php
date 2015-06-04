<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Hash;

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

		return view('profile', compact('user'));
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

	public function changePassword()
	{
		return view('password');
	}

	public function updatePassword(PasswordRequest $request)
	{
		$user = Auth::user();

		if (!Hash::check($request->get('old_password'), $user->password))
		{
			return redirect(action('ProfileController@changePassword'))
				->with('flash_error', 'Your old password was entered incorrectly. Please enter it again.');
		}

		if ($request->get('password') != $request->get('password_confirmation'))
		{
			return redirect(action('ProfileController@changePassword'))
				->with('flash_error', 'The two password fields didn\'t match, please try again.');
		}

		$user->password =  Hash::make($request->get('password'));
		$user->save();

		return redirect(action('ProfileController@changePassword'))
			->with('flash_success', 'Your password has been changed.');
	}

}