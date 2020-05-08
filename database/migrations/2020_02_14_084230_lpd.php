<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpds', function(Blueprint $table){
            $table->increments('id_lpd');
            $table->string('tahun');
            $table->string('kode_klasifikasi');
            $table->string('no_surat');
            $table->string('uraian');
            $table->string('tujuan_surat');
            $table->string('tgl');
            $table->string('jumlah');
            $table->string('folder');
            $table->string('boks');
            $table->string('rak');
            $table->string('ket');
            $table->string('aktif');
            $table->string('inaktif');
            $table->string('retensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
