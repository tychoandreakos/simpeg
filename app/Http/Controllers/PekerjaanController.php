<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PekerjaanController extends Controller
{
    public function index(Request $req, $nip)
    {
        $checking = DB::table('riwayat_pekerjaan')->where('nip_pegawai', $nip)->exists();
        if($checking){
            $riwayat_pekerjaan = DB::table('riwayat_pekerjaan')->where('nip_pegawai', $nip)->get();
            return view('riwayat_pekerjaan.update', ['pekerjaan' => $riwayat_pekerjaan]);
        } else {
            return view('riwayat_pekerjaan.create', ['nip' => $nip]);
        }
    }

    public function create(Request $request ,$nip)
    {
      
        DB::table('riwayat_pekerjaan')->insert([
            'nip_pegawai' => $nip,
            'nama_perusahaan' => $request->nama,
            'lokasi_perusahaan' => $request->lokasi,
            'jabatan_perusahaan' => $request->jabatan,
            'periode_perusahaan' => $request->periode,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect('pegawai')->with('pesan', 'Data Riwayat Pekerjaan Berhasil Dibuat');
    }

    public function update(Request $request)
    {
        DB::table('riwayat_pekerjaan')->where('id_pekerjaan', $request->id)->update([
            'nama_perusahaan' => $request->nama,
            'lokasi_perusahaan' => $request->lokasi,
            'jabatan_perusahaan' => $request->jabatan,
            'periode_perusahaan' => $request->periode,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('pegawai')->with('pesan', 'Data Riwayat_Pekerjaan Berhasil Diubah');
    }
}
