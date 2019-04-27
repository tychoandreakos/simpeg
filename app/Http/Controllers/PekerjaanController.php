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
        return view('pekerjaan.create', ['id' => $id]);   
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
        $pekerjaan = DB::table('riwayat_pekerjaan');
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
            'nip_pegawai' => $request->nip,
            'nama_perusahaan' => $request->nama,
            'lokasi_perusahaan' => $request->lokasi,
            'jabatan_perusahaan' => $request->jabatan,
            'periode_perusahaan' => $request->periode,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data pekerjaan gagal disimpan', 'Error');
            return view('pekerjaan.create');
        }
        Alert::success('Data pekerjaan berhasil disimpan', 'Sukses');
        return redirect('pegawai/detail/'. $request->nip);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = DB::table('riwayat_pekerjaan');
        $checking = $pekerjaan->where('nip_pegawai', $id)->exists();

        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $pekerjaan->where('nip_pegawai', $id)->get();
        return view('pekerjaan.edit', ['data' => $data]);
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
        $pekerjaan = DB::table('riwayat_pekerjaan');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'lokasi' => 'required',
            'jabatan' => 'required',
            'periode' => 'required',
        ]);

        $checking = $pekerjaan->where('nip_pegawai', $id)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $update = $pekerjaan->where('id_pekerjaan', $request->id_pekerjaan)->update([
        'nama_perusahaan' => $request->nama,
        'lokasi_perusahaan' => $request->lokasi,
        'jabatan_perusahaan' => $request->jabatan,
        'periode_perusahaan' => $request->periode,
        'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data pekerjaan gagal diubah', 'Error');
            return view('pekerjaan.create');
        }
        Alert::success('Data pekerjaan dengan berhasil diubah', 'Sukses');
        return redirect('pegawai/detail/'. $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
