<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu', function (Blueprint $table) {
            $table->bigIncrements('id_ibu');
            $table->unsignedBigInteger('nip_pegawai');
            $table->string('nama_ibu', 100);
            $table->date('tgl_lahir_ibu');
            $table->string('tmp_lahir_ibu', 50);
            $table->string('pend_ibu', 50);
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
        Schema::dropIfExists('ibu');
    }
}
