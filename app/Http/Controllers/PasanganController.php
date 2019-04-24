<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req, $nip)
    {
        $checking = DB::table('pasangan')->where('nip_pegawai', $nip)->exists();
        if($checking){
            $pasangan = DB::table('pasangan')->where('nip_pegawai', $nip)->get();
            return view('pasangan.update', ['pasangan' => $pasangan]);
        } else {
            return view('pasangan.create', ['nip' => $nip]);
        }
    }

    public function create(Request $request ,$nip)
    {
      
        DB::table('pasangan')->insert([
            'nip_pegawai' => $nip,
            'nama_pasangan' => $request->nama,
            'tgl_lahir_pasangan' => $request->tgl_lahir,
            'tmp_lahir_pasangan' => $request->tmp_lahir,
            'pendidikan_pasangan' => $request->pendidikan,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect('pegawai')->with('pesan', 'Data Pasangan Berhasil Dibuat');
    }

    public function update(Request $request)
    {
        DB::table('pasangan')->where('id_pasangan', $request->id)->update([
            'nama_pasangan' => $request->nama,
            'tgl_lahir_pasangan' => $request->tgl_lahir,
            'tmp_lahir_pasangan' => $request->tmp_lahir,
            'pendidikan_pasangan' => $request->pendidikan,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('pegawai')->with('pesan', 'Data Pasangan Berhasil Diubah');
    }
}
