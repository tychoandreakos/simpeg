<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangan', function (Blueprint $table) {
            $table->bigIncrements('id_pasangan');
            $table->unsignedBigInteger('nip_pegawai');
            $table->string('nama_pasangan', 100);
            $table->date('tgl_lahir_pasangan');
            $table->string('tmp_lahir_pasangan');
            $table->string('pendidikan_pasangan', 50);
            $table->timestamps();

            $table->foreign('nip_pegawai')
      ->references('nip_pegawai')->on('pegawai')
      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasangan');
    }
}
