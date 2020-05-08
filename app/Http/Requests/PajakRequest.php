<?php namespace App\Http\Requests;
class PajakRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id_gol' => 'required|max:30',
			'pajak' => 'required|max:100'
			
		];
	}
}