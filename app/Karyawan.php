<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
	//membuat primary key
	protected $primaryKey = 'id_karyawan';

    protected $fillable = ['id_karyawan', 'nama_karyawan'];
}
