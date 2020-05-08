<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//untuk membuat relasi
use App\Golongan;
use App\Pangkat;
use App\Honor;
use App\Pajak;

class Dosen extends Model
{

    protected $primaryKey ='id_dosen';
    protected $fillable=['id_dosen','nama','alamat','hp','id_gol',
    'status', 'id_pangkat', 'ket_dos', 'rutinitas'];

    public function golongan(){
    	return $this->hasOne(Golongan::class,'id_gol','id_gol');
    }

    public function pangkat(){
    	return $this->hasOne(Pangkat::class,'id_pangkat','id_pangkat');
    }
    public function honor(){
    	return $this->hasOne(Honor::class,'id_pangkat','id_pangkat');
    }
    public function pajak(){
    	return $this->hasOne(Pajak::class,'id_gol','id_gol');
    }
}
