<?php namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Http\Requests\PasswordRequest;

class PasswordController extends Controller {

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

		return view('password', compact(
			'user'
		));
	}

	public function updatePassword(PasswordRequest $request)
	{
		$user = Auth::user();
		$now_password   = $request->get('old_password');
		if(Hash::check($now_password, $user->password)){

			$user->password = Hash::make($request->get('password'));
			$user->save();

			return redirect(action('PasswordController@index'))
				->with('flash_success', 'Password updated successfully.');
		}else{


		//$user-> = $request->get('name');
		//$user->save();

		return redirect(action('PasswordController@index'))
			->with('flash_success', 'Password updated fail.');
		}
	}


}
