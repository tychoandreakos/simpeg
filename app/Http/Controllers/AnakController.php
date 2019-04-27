<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class AnakController extends Controller
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
        return view('anak.create', ['id' => $id]);    
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
        $anak = DB::table('anak');
        $pegawai = DB::table('pegawai');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required',
            'tmp' => 'required',
            'pendidikan' => 'required',
            'jk' => 'required',
            'status' => 'required',
        ]);

        $checking = $pegawai->where('nip_pegawai', $request->nip)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $saved = $anak->insert([
            'nip_pegawai' => $request->nip,
            'nama_anak' => $request->nama,
            'tgl_lahir_anak' => $request->tgl,
            'tmp_lahir_anak' => $request->tmp,
            'pendidikan_anak' => $request->pendidikan,
            'jk_anak' => $request->jk,
            'status_anak' => $request->status,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data anak gagal disimpan', 'Error');
            return view('anak.create');
        }
        Alert::success('Data anak berhasil disimpan', 'Sukses');
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
        $anak = DB::table('anak');
        $checking = $anak->where('nip_pegawai', $id)->exists();

        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $anak->where('nip_pegawai', $id)->get();
        return view('anak.edit', ['data' => $data]);
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
        $anak = DB::table('anak');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required',
            'tmp' => 'required',
            'pendidikan' => 'required',
            'jk' => 'required',
            'status' => 'required',
        ]);

        $checking = $anak->where('nip_pegawai', $id)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $update = $anak->where('id_anak', $request->id_anak)->update([
            'nama_anak' => $request->nama,
            'tgl_lahir_anak' => $request->tgl,
            'tmp_lahir_anak' => $request->tmp,
            'pendidikan_anak' => $request->pendidikan,
            'jk_anak' => $request->jk,
            'status_anak' => $request->status,
            'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data anak gagal diubah', 'Error');
            return view('anak.create');
        }
        Alert::success('Data anak dengan berhasil diubah', 'Sukses');
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
