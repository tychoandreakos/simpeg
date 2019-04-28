<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Faker\factory as Faker;
use Alert;
use PDF;
use App;

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
        return view('pegawai.index', ['pegawai' => $pegawai, 'title' => 'pegawai']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create', ['title' => 'Tambah data pegawai']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Faker::create('id_ID');
        $now = \Carbon\Carbon::now();
        $pegawai = DB::table('pegawai');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'tgl' => 'required|date',
            'tmp' => 'required',
            'jk' => 'required',
            'no_telp' => 'required|numeric',
            'status' => 'required',
            'email' => 'required|email',
            'goldar' => 'required',
            'agama' => 'required',
        ]);
        

        $saved = $pegawai->insert([
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
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data pegawai gagal disimpan', 'Error');
            return redirect('pegawai');
        }

        Alert::success('Data pegawai berhasil disimpan', 'Sukses');
        return redirect('pegawai');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        $anak = App\Pegawai::find($nip)->anak()->where('pegawai_nip_pegawai', $nip)->orderBy('status_anak', 'asc')
        ->get();

        $pekerjaan = App\Pegawai::find($nip)->pekerjaan()->where('pegawai_nip_pegawai', $nip)->orderBy('periode_perusahaan', 'asc')
        ->get();

        $pegawai = DB::table('pegawai')
        //    ->select('pegawai.nip_pegawai as nippegawai')
           ->leftJoin('pasangan','pegawai.nip_pegawai', '=', 'pasangan.nip_pegawai')
           ->leftJoin('ayah','pegawai.nip_pegawai', '=', 'ayah.nip_pegawai')
           ->leftJoin('ibu','pegawai.nip_pegawai', '=', 'ibu.nip_pegawai')
           ->where('pegawai.nip_pegawai', '=', $nip)
           ->get();


            return view('pegawai.detail', ['pegawai' => $this->middle($pegawai, $nip), 'anak' => $anak , 'pekerjaan' => $pekerjaan, 'title' => 'Detail data pegawai']);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $pegawai = DB::table('pegawai');
        $checking = $pegawai->where('nip_pegawai', $id)->exists();

        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $pegawai->where('nip_pegawai', $id)->get();
        return view('pegawai.edit', ['data' => $data, 'title' => 'Edit data pegawai']);
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
        $faker = Faker::create('id_ID');
        $now = \Carbon\Carbon::now();
        $pegawai = DB::table('pegawai');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'tgl' => 'required|date',
            'tmp' => 'required',
            'jk' => 'required',
            'no_telp' => 'required|numeric',
            'status' => 'required',
            'email' => 'required|email',
            'goldar' => 'required',
            'agama' => 'required',
        ]);

        $checking = $pegawai->where('nip_pegawai', $request->nip)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $updated = $pegawai->where('nip_pegawai', $request->nip)->update([
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
            'updated_at' => \Carbon\Carbon::now()
        ]);

        if(!$updated){
            Alert::error('Data pegawai gagal diupdate', 'Error');
            return redirect('pegawai');
        }

        Alert::success('Data pegawai berhasil diupdate', 'Sukses');
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = DB::table('pegawai');
        $checking = $pegawai->where('nip_pegawai', $id)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $deleted = $pegawai->where('nip_pegawai', $id)->delete();

        if(!$deleted){
            Alert::error('Data pegawai gagal dihapus', 'Error');
            return redirect('pegawai');
        }

        Alert::success('Data pegawai berhasil dihapus', 'Sukses');
        return redirect('pegawai');
    }

    public function print($nip)
    {
        $anak = App\Pegawai::find($nip)->anak()->where('pegawai_nip_pegawai', $nip)->orderBy('status_anak', 'asc')
        ->get();

        $pekerjaan = App\Pegawai::find($nip)->pekerjaan()->where('pegawai_nip_pegawai', $nip)->orderBy('periode_perusahaan', 'asc')
        ->get();

        $pegawai = DB::table('pegawai')
        //    ->select('pegawai.nip_pegawai as nippegawai')
           ->leftJoin('pasangan','pegawai.nip_pegawai', '=', 'pasangan.nip_pegawai')
           ->leftJoin('ayah','pegawai.nip_pegawai', '=', 'ayah.nip_pegawai')
           ->leftJoin('ibu','pegawai.nip_pegawai', '=', 'ibu.nip_pegawai')
           ->where('pegawai.nip_pegawai', '=', $nip)
           ->get();
        
           $pdf = PDF::loadview('print.cetakPegawai', ['pegawai' => $this->middle($pegawai, $nip), 'pekerjaan' => $pekerjaan, 'anak' => $anak]);
           return $pdf->stream();
    }

    public function printShortly($nip)
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
        
           $pdf = PDF::loadview('print.cetakPegawaiShortly', ['pegawai' => $this->middle($pegawai, $nip)]);
           return $pdf->stream();
    }

    public function status($stat)
    {
        if($stat == 0){
            return 'Menikah';
        } else {
            return 'Belum Menikah';
        }
    }

    public static function jk($jk)
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

    public static function status_anak($anak)
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
