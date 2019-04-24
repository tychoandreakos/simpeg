<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AyahController extends Controller
{
    public function index(Request $req, $nip)
    {
        $checking = DB::table('ayah')->where('nip_pegawai', $nip)->exists();
        if($checking){
            $ayah = DB::table('ayah')->where('nip_pegawai', $nip)->get();
            return view('ayah.update', ['ayah' => $ayah]);
        } else {
            return view('ayah.create', ['nip' => $nip]);
        }
    }

    public function create(Request $request ,$nip)
    {
      
        DB::table('ayah')->insert([
            'nip_pegawai' => $nip,
            'nama_ayah' => $request->nama,
            'tgl_lahir_ayah' => $request->tgl_lahir,
            'tmp_lahir_ayah' => $request->tmp_lahir,
            'pend_ayah' => $request->pendidikan,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect('pegawai')->with('pesan', 'Data ayah Berhasil Dibuat');
    }

    public function update(Request $request)
    {
        DB::table('ayah')->where('id_ayah', $request->id)->update([
            'nama_ayah' => $request->nama,
            'tgl_lahir_ayah' => $request->tgl_lahir,
            'tmp_lahir_ayah' => $request->tmp_lahir,
            'pend_ayah' => $request->pendidikan,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('pegawai')->with('pesan', 'Data ayah Berhasil Diubah');
    }
}
