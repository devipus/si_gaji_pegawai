<?php namespace App\Http\Requests;
class DosenRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nama' => 'required|max:30',
			'alamat' => 'required|max:100',
			'hp' => 'required|max:15',
			'id_gol' => 'required|max:20',
			'status' => 'required|max:20',
			'id_pangkat' => 'required|max:20',
			'ket_dos' => 'required|max:20',
			'rutinitas' => 'required|max:30'
		];
	}
}