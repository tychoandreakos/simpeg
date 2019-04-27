<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class AyahController extends Controller
{
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
        return view('ayah.create', ['id' => $id]);   
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
        $ayah = DB::table('ayah');
        $pegawai = DB::table('pegawai');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required',
            'tmp' => 'required',
            'pendidikan' => 'required',
        ]);

        $checking = $pegawai->where('nip_pegawai', $request->nip)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $saved = $ayah->insert([
            'nip_pegawai' => $request->nip,
            'nama_ayah' => $request->nama,
            'tgl_lahir_ayah' => $request->tgl,
            'tmp_lahir_ayah' => $request->tmp,
            'pend_ayah' => $request->pendidikan,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data ayah gagal disimpan', 'Error');
            return view('ayah.create');
        }
        Alert::success('Data ayah berhasil disimpan', 'Sukses');
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
        $ayah = DB::table('ayah');
        $checking = $ayah->where('nip_pegawai', $id)->exists();

        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $ayah->where('nip_pegawai', $id)->get();
        return view('ayah.edit', ['data' => $data]);
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
        $ayah = DB::table('ayah');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required',
            'tmp' => 'required',
            'pendidikan' => 'required',
        ]);

        $checking = $ayah->where('nip_pegawai', $id)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $update = $ayah->where('id_ayah', $request->id_ayah)->update([
            'nama_ayah' => $request->nama,
            'tgl_lahir_ayah' => $request->tgl,
            'tmp_lahir_ayah' => $request->tmp,
            'pend_ayah' => $request->pendidikan,
            'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data ayah gagal diubah', 'Error');
            return redirect('pegawai/detail/'. $id);
        }
        Alert::success('Data ayah dengan berhasil diubah', 'Sukses');
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
