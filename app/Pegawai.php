<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'nip_pegawai';

    public function anak()
    {
        return $this->hasMany('App\Anak');
    }

    public function pekerjaan()
    {
        return $this->hasMany('App\Riwayat_pekerjaan');
    }
}
