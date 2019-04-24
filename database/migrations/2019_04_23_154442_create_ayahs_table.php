<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayah', function (Blueprint $table) {
            $table->bigIncrements('id_ayah');
            $table->unsignedBigInteger('nip_pegawai');
            $table->string('nama_ayah', 100);
            $table->date('tgl_lahir_ayah');
            $table->string('tmp_lahir_ayah', 50);
            $table->string('pend_ayah', 50);
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
        Schema::dropIfExists('ayah');
    }
}
