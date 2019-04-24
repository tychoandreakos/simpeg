<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->bigIncrements('id_anak');
            $table->unsignedBigInteger('nip_pegawai');
            $table->string('nama_anak', 100);
            $table->date('tgl_lahir_anak');
            $table->string('tmp_lahir_anak', 50);
            $table->string('pendidikan_anak', 50);
            $table->enum('jk_anak', ['0','1']);
            $table->enum('status_anak', ['0','1','2','3']);

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
        Schema::dropIfExists('anak');
    }
}
