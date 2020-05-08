<?php namespace App\Http\Requests;
class MengajarRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id_dosen' => 'required|max:30',
			'kd_matkul' => 'required|max:50',
			'semester' => 'required|max:10',
			'id_jurusan' => 'required|max:20',
			'id_kelas' => 'required|max:20'
		];
	}
}