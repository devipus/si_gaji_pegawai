<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function(Blueprint $table){
            $table->increments('id_dosen');
            $table->string('nama');
            $table->string('alamat');
            $table->string('hp');
            $table->string('id_gol');
            $table->string('status');
            $table->string('id_pangkat');
            $table->string('ket_dos');
            $table->string('rutinitas');
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
        Schema::dropIfExists('dosens');
    }
}
