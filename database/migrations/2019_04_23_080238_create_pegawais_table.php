<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigInteger('nip_pegawai')->unsigned();
            $table->string('nama', 100);
            $table->string('alamat', 100);
            $table->date('tgl_lahir');
            $table->string('tmp_lahir', 50);
            $table->enum('jk', ['0','1']);
            $table->string('no_telp', 20);
            $table->enum('status',['0','1']);
            $table->string('email')->nullable();
            $table->enum('gol_darah', ['0','1','2','3']);
            $table->enum('agama', ['0','1','2','3']);

            $table->primary('nip_pegawai');
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
        Schema::dropIfExists('pegawai');
    }
}
