<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $primaryKey ='id_gol';
    protected $fillable=['id_gol','golongan'];
}
