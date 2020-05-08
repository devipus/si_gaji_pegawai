<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pangkat;

class Honor extends Model
{
    protected $primaryKey ='id_honor';
    protected $fillable=['id_honor','id_pangkat','honor'];

    public function pangkat(){
    	return $this->hasOne(Pangkat::class,'id_pangkat','id_pangkat');
    }
}
