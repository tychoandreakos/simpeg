<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    public function anak()
    {
        return $this->hasMany('App\Anak');
    }
}
