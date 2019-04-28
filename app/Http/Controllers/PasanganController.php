<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class PasanganController extends Controller
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
        return view('pasangan.create', ['id' => $id , 'title' => 'Tambah data pasangan']);   
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
        $pasangan = DB::table('pasangan');
        $pegawai = DB::table('pegawai');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required|date',
            'tmp' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
        ]);

        $checking = $pegawai->where('nip_pegawai', $request->nip)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $saved = $pasangan->insert([
            'nip_pegawai' => $request->nip,
            'nama_pasangan' => $request->nama,
            'tgl_lahir_pasangan' => $request->tgl,
            'tmp_lahir_pasangan' => $request->tmp,
            'pendidikan_pasangan' => $request->pendidikan,
            'status_pasangan' => $request->status,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data pasangan gagal disimpan', 'Error');
            return redirect('pegawai/'. $request->nip .'/detail');
        }
        Alert::success('Data pasangan berhasil disimpan', 'Sukses');
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
        $pasangan = DB::table('pasangan');
        $checking = $pasangan->where('nip_pegawai', $id)->exists();

        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $pasangan->where('nip_pegawai', $id)->get();
        return view('pasangan.edit', ['data' => $data , 'title' => 'Edit data pasangan']);
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
        $pasangan = DB::table('pasangan');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required|date',
            'tmp' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
        ]);

        $checking = $pasangan->where('nip_pegawai', $id)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $update = $pasangan->where('id_pasangan', $request->id_pasangan)->update([
            'nama_pasangan' => $request->nama,
            'tgl_lahir_pasangan' => $request->tgl,
            'tmp_lahir_pasangan' => $request->tmp,
            'pendidikan_pasangan' => $request->pendidikan,
            'status_pasangan' => $request->status,
            'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data pasangan gagal diubah', 'Error');
            return redirect('pegawai/'. $id .'/detail');
        }
        Alert::success('Data pasangan dengan berhasil diubah', 'Sukses');
        return redirect('pegawai/'. $id .'/detail');
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
