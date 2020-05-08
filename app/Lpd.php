<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lpd extends Model
{
    protected $primaryKey ='id_lpd';
    protected $fillable=['id_lpd','tahun','kode_klasifikasi','no_surat','uraian','tujuan_surat','tgl','jumlah','folder','boks','rak','ket', 'aktif', 'inaktif', 'retensi'];
}
