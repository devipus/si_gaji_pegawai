<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Penggajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id penggajian, id dosen, bulan, jumlah hadir, honor satuan, gaji honor, total pajak, total gaji bersih

        Schema::create('penggajians', function(Blueprint $table){
            $table->increments('id_penggajian');
            $table->string('id_dosen');
            $table->string('tgl');
            $table->string('jml_hadir');
            $table->string('honor_satuan');
            $table->string('gaji_honor');
            $table->string('total_pajak');
            $table->string('total_gaber');
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
