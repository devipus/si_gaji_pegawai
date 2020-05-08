<?php namespace App\Http\Requests;
class HonorRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id_pangkat' => 'required|max:30',
			'honor' => 'required|max:100'
			
		];
	}
}