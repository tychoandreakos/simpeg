<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function index(Request $req, $nip)
    {
        $checking = DB::table('anak')->where('nip_pegawai', $nip)->exists();
        if($checking){
            $anak = DB::table('anak')->where('nip_pegawai', $nip)->get();
            return view('anak.update', ['anak' => $anak]);
        } else {
            return view('anak.create', ['nip' => $nip]);
        }
    }

    public function create(Request $request ,$nip)
    {
      
        DB::table('anak')->insert([
            'nip_pegawai' => $nip,
            'nama_anak' => $request->nama,
            'tgl_lahir_anak' => $request->tgl_lahir,
            'tmp_lahir_anak' => $request->tmp_lahir,
            'pendidikan_anak' => $request->pendidikan,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect('pegawai')->with('pesan', 'Data anak Berhasil Dibuat');
    }

    public function update(Request $request)
    {
        DB::table('anak')->where('id_anak', $request->id)->update([
            'nama_anak' => $request->nama,
            'tgl_lahir_anak' => $request->tgl_lahir,
            'tmp_lahir_anak' => $request->tmp_lahir,
            'pendidikan_anak' => $request->pendidikan,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('pegawai')->with('pesan', 'Data anak Berhasil Diubah');
    }
}
