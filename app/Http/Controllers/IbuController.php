<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IbuController extends Controller
{
    public function index(Request $req, $nip)
    {
        $checking = DB::table('ibu')->where('nip_pegawai', $nip)->exists();
        if($checking){
            $ibu = DB::table('ibu')->where('nip_pegawai', $nip)->get();
            return view('ibu.update', ['ibu' => $ibu]);
        } else {
            return view('ibu.create', ['nip' => $nip]);
        }
    }

    public function create(Request $request ,$nip)
    {
      
        DB::table('ibu')->insert([
            'nip_pegawai' => $nip,
            'nama_ibu' => $request->nama,
            'tgl_lahir_ibu' => $request->tgl_lahir,
            'tmp_lahir_ibu' => $request->tmp_lahir,
            'pend_ibu' => $request->pendidikan,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect('pegawai')->with('pesan', 'Data ibu Berhasil Dibuat');
    }

    public function update(Request $request)
    {
        DB::table('ibu')->where('id_ibu', $request->id)->update([
            'nama_ibu' => $request->nama,
            'tgl_lahir_ibu' => $request->tgl_lahir,
            'tmp_lahir_ibu' => $request->tmp_lahir,
            'pend_ibu' => $request->pendidikan,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('pegawai')->with('pesan', 'Data ibu Berhasil Diubah');
    }
}

