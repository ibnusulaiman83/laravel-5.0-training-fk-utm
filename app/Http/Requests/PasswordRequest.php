<?php namespace App\Http\Requests;

use User;

class PasswordRequest extends Request
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
		return [
			'old_password' => ['required','min:6'],
			'password_confirmation' => ['required','min:6'],
			'password' => ['required','min:6','confirmed','different:old_password']
			//'password' => ['required','min:6','confirmed','different:old_password']
  	];
	}

}