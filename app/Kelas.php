<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey ='id_kelas';
    protected $fillable=['id_kelas','kelas'];
}
