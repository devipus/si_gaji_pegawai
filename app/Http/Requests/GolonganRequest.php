<?php namespace App\Http\Requests;
class GolonganRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		
			'golongan' => 'required|max:30',
			
		];
	}
}