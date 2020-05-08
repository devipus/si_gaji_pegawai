<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dosen;

class Penggajian extends Model
{
    protected $primaryKey ='id_penggajian';
    protected $fillable = ['id_penggajian','id_dosen','tgl','jml_hadir','honor_satuan','gaji_honor','total_pajak','total_gaber'];

    
    public function dosen(){
        return $this->hasOne(Dosen::class,'id_dosen','id_dosen');
    }
    
    public static function create(array $attributes =[])
    {
        //with utk semua model yg dipakai
        $dosen = Dosen::where('id_dosen', $attributes['id_dosen'])->with('pangkat')->with('golongan')->with('pajak')->with('honor')->first();
        
        //float agar int
        //$dosen->honor->honor->
            //honor yg pertama itu model
            //honor yg kedua itu field dr tabel honor
        $totalGaji=(float)$dosen->honor->honor * (float)$attributes['jml_hadir'];
        
        //if model pajak dari $dosen yg atas
        if($dosen->pajak){
            $totalGajiBersih = $totalGaji - ($totalGaji /100 * $dosen->pajak->pajak);
        }else{
            //jika tidak ada pajak
            $totalGajiBersih = $totalGaji;
        }
        
        //new static ($attributes) adalah identifikasi attribut yg ada di tb penggajian yg diatas
        $model = new static ($attributes);
        $model->honor_satuan = $dosen->honor->honor;
        $model->gaji_honor = $totalGaji;
        //$dosen->pajak->pajak : '' berarti pajak boleh kosong
        $model->total_pajak = $dosen->pajak ? $dosen->pajak->pajak : '';
        $model->total_gaber = $totalGajiBersih;
        //tgl utk mengambil bulan saja
        $model->tgl=$model->tgl . '-01';
        $model->save();
        
        return $model;
    }
    
    
}
