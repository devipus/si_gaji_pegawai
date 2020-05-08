<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dosen;
use App\Matkul;
use App\Jurusan;
use App\Kelas;

class Mengajar extends Model
{
    // relasi dengan dosen, matkul, jurusan, kelas
    protected $primaryKey ='id_mengajar';
    protected $fillable=['id_mengajar','id_dosen','kd_matkul','semester','id_jurusan','id_kelas'];

    public function dosen(){
    	return $this->hasOne(Dosen::class,'id_dosen','id_dosen');
    }

    public function matkul(){
    	return $this->hasOne(Matkul::class,'kd_matkul','kd_matkul');
    }

    public function jurusan(){
    	return $this->hasOne(Jurusan::class,'id_jurusan','id_jurusan');
    }

    public function kelas(){
    	return $this->hasOne(Kelas::class,'id_kelas','id_kelas');
    }
}
