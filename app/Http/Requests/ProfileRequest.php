<?php namespace App\Http\Requests;

use User;

class ProfileRequest extends Request
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$user = \Auth::user();

		return [
			'name' => ['required'],
			'email' => ['required', 'unique:users,email,' . $user->id . '']
  	];
	}

}