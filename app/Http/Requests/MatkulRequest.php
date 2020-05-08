<?php namespace App\Http\Requests;
class MatkulRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'matkul' => 'required|max:50'
		];
	}
}