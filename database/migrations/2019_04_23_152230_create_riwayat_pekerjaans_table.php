<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id_pekerjaan');
            $table->unsignedBigInteger('nip_pegawai');
            $table->string('nama_perusahaan', 100);
            $table->string('lokasi_perusahaan', 100);
            $table->string('jabatan_perusahaan', 50);
            $table->string('periode_perusahaan', 50);
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
        Schema::dropIfExists('riwayat_pekerjaan');
    }
}
