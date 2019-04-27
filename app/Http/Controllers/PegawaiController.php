<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Faker\factory as Faker;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = DB::table('pegawai')->orderByRaw('created_at','DESC')->get();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.createPegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $this->validation($request);

        $faker = Faker::create('id_ID');

        $store = DB::table('pegawai')->insert([
            'nip_pegawai' => $faker->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl,
            'tmp_lahir' => $request->tmp,
            'jk' => $request->jk,
            'no_telp' => $request->no_telp,
            'status' => $request->status,
            'email' => $request->email,
            'gol_darah' => $request->goldar,
            'agama' => $request->agama,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        if($store){
            return redirect('pegawai')->with('pesan', 'Data berhasil ditambah');
        } else {
            return redirect('pegawai')->with('pesan', 'Data berhasil gagal');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function validation($request)
    {
        return $validasiData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
    }
    public function edit($nip)
    {
        $pegawai = DB::table('pegawai')->where('nip_pegawai', $nip)->get();
        if(!$pegawai->isEmpty()) {
            return view('pegawai.edit', ['pegawai' => $pegawai]);
        } else {
            return redirect('pegawai')->with('pesan', 'Data Tidak Ditemukan');
        }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validation($request);

        $update = DB::table('pegawai')->where('nip_pegawai', $request->nip)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        if($update) {
            return redirect('pegawai')->with('pesan', 'Data Berhasil Diupdate');
        } else {
            return redirect('pegawai')->with('pesan', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $delete = DB::table('pegawai')->where('nip_pegawai', $nip)->delete();

        if($delete) {
            return redirect('pegawai')->with('pesan', 'Data Berhasil Dihapus');
        } else {
            return redirect('pegawai')->with('pesan', 'Data Gagal Dihapus');
        }
    }

    public function detail($nip)
    {
       $pegawai = DB::table('pegawai')
    //    ->select('pegawai.nip_pegawai as nippegawai')
       ->leftJoin('pasangan','pegawai.nip_pegawai', '=', 'pasangan.nip_pegawai')
       ->leftJoin('anak','pegawai.nip_pegawai', '=', 'anak.nip_pegawai')
       ->leftJoin('riwayat_pekerjaan','pegawai.nip_pegawai', '=', 'riwayat_pekerjaan.nip_pegawai')
       ->leftJoin('ayah','pegawai.nip_pegawai', '=', 'ayah.nip_pegawai')
       ->leftJoin('ibu','pegawai.nip_pegawai', '=', 'ibu.nip_pegawai')
       ->where('pegawai.nip_pegawai', '=', $nip)
       ->get();
    
        return view('pegawai.detail', ['pegawai' => $this->middle($pegawai, $nip)]);
    }

    public function middle($pegawai, $nip)
    {
        $checking = DB::table('pegawai')->where('nip_pegawai', $nip)->exists();
        if($checking) {
            $pegawai = $pegawai[0];
            $identitas = [
                // pegawai
                'nip' => $nip,
                'nama' => $pegawai->nama,
                'alamat' => $pegawai->alamat,
                'lahir' => $pegawai->tmp_lahir .", ". $pegawai->tgl_lahir,
                'jk' => $this->jk($pegawai->jk),
                'no_telp' => $pegawai->no_telp,
                'status' => $this->status($pegawai->status),
                'email' => $this->email($pegawai->email),
                'gol_darah' => $this->goldar($pegawai->gol_darah),
                'agama' => $this->agama($pegawai->agama),
    
                //pasangan
                'id_pasangan' => $pegawai->id_pasangan,
                'nama_pasangan' => $pegawai->nama_pasangan,
                'lahir_pasangan' => $pegawai->tmp_lahir_pasangan .", ". $pegawai->tgl_lahir_pasangan,
                'pendidikan_pasangan' => $pegawai->pendidikan_pasangan,
                'status_pasangan' => $this->status_pasangan($pegawai->pendidikan_pasangan),
    
                // anak
                'id_anak' => $pegawai->id_anak,
                'nama_anak' => $pegawai->nama_anak,
                'lahir_anak' => $pegawai->tmp_lahir_anak .", ". $pegawai->tgl_lahir_anak,
                'pendidikan_anak' => $pegawai->pendidikan_anak,
                'jk_anak' => $this->jk($pegawai->jk_anak),
                'status_anak' => $this->status_anak($pegawai->status_anak),
    
                // pekerjaan
                'id_pekerjaan' => $pegawai->id_pekerjaan,
                'nama_perusahaan' => $pegawai->nama_perusahaan,
                'lokasi_perusahaan' => $pegawai->lokasi_perusahaan,
                'jabatan_perusahaan' => $pegawai->jabatan_perusahaan,
                'periode_perusahaan' => $pegawai->periode_perusahaan,
    
                // ayah
                'id_ayah' => $pegawai->id_ayah,
                'nama_ayah' => $pegawai->nama_ayah,
                'lahir_ayah' => $pegawai->tmp_lahir_ayah .", ". $pegawai->tgl_lahir_ayah,
                'pendidikan_ayah' => $pegawai->pend_ayah,
    
                // ibu
                'id_ibu' => $pegawai->id_ibu,
                'nama_ibu' => $pegawai->nama_ibu,
                'lahir_ibu' => $pegawai->tmp_lahir_ibu .", ". $pegawai->tgl_lahir_ibu,
                'pendidikan_ibu' => $pegawai->pend_ibu,
            ];
    
            return $identitas;
        } else {
            return redirect('pegawai')->with('pesan', 'NIP Pegawai Tidak Ada');
        }
       
    }

    public function status($stat)
    {
        if($stat == 0){
            return 'Menikah';
        } else {
            return 'Belum Menikah';
        }
    }

    public function jk($jk)
    {
        if($jk == 0){
            return 'Laki - laki';
        } else {
            return 'Perempuan';
        }
    }

    public function email($email)
    {
        if(is_null($email)){
            return 'Tidak ditemukan email';
        } else {
            return $email;
        }
    }

    public function goldar($goldar)
    {
        if($goldar == 0)
        {
            return 'O';
        } else if($goldar == 1)
        {
            return 'A';
        } else if($goldar == 2)
        {
            return 'B';
        } else if($goldar == 3)
        {
            return 'AB';
        } else {
            echo 'Tidak ditemukan data';
        }
    }

    public function agama($agama)
    {
        if($agama == 0)
        {
            return 'Islam';
        } else if($agama == 1)
        {
            return 'Kristen';
        } else if($agama == 2)
        {
            return 'Hindu';
        } else if($agama == 3)
        {
            return 'Budha';
        } else {
            echo 'Tidak ditemukan data';
        }
    }

    public function status_anak($anak)
    {
        if($anak == 0)
        {
            return 'Anak ke 1';
        } else if($anak == 1)
        {
            return 'Anak ke 2';
        } else if($anak == 2)
        {
            return 'Anak ke 3';
        } else if($anak == 3)
        {
            return 'Anak ke 4';
        } else {
            echo 'Tidak ditemukan data';
        }
    }

    public function status_pasangan($pasangan)
    {
        if($pasangan == 0)
        {
            return 'Istri';
        } else {
            return 'Suami';
        }
    }

}
