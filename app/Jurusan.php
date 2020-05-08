<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $primaryKey ='id_jurusan';
    protected $fillable=['id_jurusan','jurusan'];
}
