<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    protected $primaryKey ='id_pangkat';
    protected $fillable=['id_pangkat','pangkat'];
}
