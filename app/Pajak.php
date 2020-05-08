<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Golongan;

class Pajak extends Model
{
    protected $primaryKey ='id_pajak';
    protected $fillable=['id_pajak','id_gol','pajak'];

    public function golongan(){
    	return $this->hasOne(Golongan::class,'id_gol','id_gol');
    }

}
