<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('pekerjaan.create', ['id' => $id , 'title' => 'Tambah data riwayat pekerjaan']);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = \Carbon\Carbon::now();
        $pekerjaan = DB::table('pekerjaan');
        $pegawai = DB::table('pegawai');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'lokasi' => 'required',
            'jabatan' => 'required',
            'periode' => 'required',
        ]);

        $checking = $pegawai->where('nip_pegawai', $request->nip)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }


       $saved = $pekerjaan->insert([
            'pegawai_nip_pegawai' => $request->nip,
            'nama_perusahaan' => $request->nama,
            'lokasi_perusahaan' => $request->lokasi,
            'jabatan_perusahaan' => $request->jabatan,
            'periode_perusahaan' => $request->periode,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data pekerjaan gagal disimpan', 'Error');
            return redirect('pegawai/'. $request->nip .'/detail');
        }
        Alert::success('Data pekerjaan berhasil disimpan', 'Sukses');
        return redirect('pegawai/'. $request->nip .'/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pekerjaan = DB::table('pekerjaan')->where('pegawai_nip_pegawai', $id)->get();
        return view('pekerjaan.show', ['pekerjaan' => $pekerjaan, 'id' => $id, 'title' => 'Tampil data riwayat pekerjaan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = DB::table('pekerjaan');
        $checking = $pekerjaan->where('id_pekerjaan', $id)->exists();

        if(!$checking){
            Alert::error('Data pekerjaan tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $pekerjaan->where('id_pekerjaan', $id)->get();
        return view('pekerjaan.edit', ['data' => $data, 'title' => 'Edit data riwayat pekerjaan']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $now = \Carbon\Carbon::now();
        $pekerjaan = DB::table('pekerjaan');


        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'lokasi' => 'required',
            'jabatan' => 'required',
            'periode' => 'required',
        ]);


        $checking = $pekerjaan->where('id_pekerjaan', $id)->exists();
        if(!$checking){
            Alert::error('Data pekerjaan tidak ditemukan', 'Error');
            return redirect('pegawai/detail/pekerjaan/'. $request->nip .'/show');
        }

       $update = $pekerjaan->where('id_pekerjaan', $id)->update([
        'nama_perusahaan' => $request->nama,
        'lokasi_perusahaan' => $request->lokasi,
        'jabatan_perusahaan' => $request->jabatan,
        'periode_perusahaan' => $request->periode,
        'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data pekerjaan dengan nama '. $request->nama .' gagal diubah', 'Error');
            return redirect('pegawai/detail/pekerjaan/'. $request->nip .'/show');
        }
        Alert::success('Data pekerjaan dengan nama '. $request->nama .' berhasil diubah', 'Sukses');
        return redirect('pegawai/detail/pekerjaan/'. $request->nip .'/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip, $id)
    {
        $pekerjaan = DB::table('pekerjaan');
        $deleted = $pekerjaan->where('id_pekerjaan', $id)->delete();

        if(!$deleted){
            Alert::error('Data pekerjaan gagal dihapus', 'Error');
            return redirect('pegawai/detail/pekerjaan/'. $nip .'/show');
        }

        Alert::success('Data pekerjaan berhasil dihapus', 'Sukses');
        return redirect('pegawai/detail/pekerjaan/'. $nip .'/show');
    }
}
