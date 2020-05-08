<?php namespace App\Http\Requests;
class PangkatRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		
			'pangkat' => 'required|max:30',
			
		];
	}
}