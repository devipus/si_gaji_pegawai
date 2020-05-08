<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primayKey = 'nim_mhs';
    protected $fillable = ['nim_mhs', 'nama_mhs', 'kelas'];
}
