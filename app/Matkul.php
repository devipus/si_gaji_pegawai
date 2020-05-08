<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $primaryKey ='id_matkul';
    protected $fillable=['id_matkul','matkul'];
}
