<?php namespace App\Http\Requests;
use Validator;
use App\Dosen;

class PenggajianRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		Validator::extend('dosens', function ($attribute, $value, $parameters, $validator)
		{
			$dosen = Dosen::where('id_dosen',$value)->first();
			if(!$dosen){return null;}
			return true;
		});
		
		return [
			'id_dosen' => 'required|max:30',
			'tgl' => 'required|max:30',
			'jml_hadir'	=> 'required|max:30'
		];
	}
}