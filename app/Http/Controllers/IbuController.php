<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;


class IbuController extends Controller
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
        return view('ibu.create', ['id' => $id]);   
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
        $ibu = DB::table('ibu');
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

       $saved = $ibu->insert([
            'nip_pegawai' => $request->nip,
            'nama_ibu' => $request->nama,
            'tgl_lahir_ibu' => $request->tgl,
            'tmp_lahir_ibu' => $request->tmp,
            'pend_ibu' => $request->pendidikan,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if(!$saved){
            Alert::error('Data ibu gagal disimpan', 'Error');
            return view('ibu.create');
        }
        Alert::success('Data ibu berhasil disimpan', 'Sukses');
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
        $ibu = DB::table('ibu');
        $checking = $ibu->where('nip_pegawai', $id)->exists();

        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $ibu->where('nip_pegawai', $id)->get();
        return view('ibu.edit', ['data' => $data]);
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
        $ibu = DB::table('ibu');

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required',
            'tmp' => 'required',
            'pendidikan' => 'required',
        ]);

        $checking = $ibu->where('nip_pegawai', $id)->exists();
        if(!$checking){
            Alert::error('NIP tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

       $update = $ibu->where('id_ibu', $request->id_ibu)->update([
            'nama_ibu' => $request->nama,
            'tgl_lahir_ibu' => $request->tgl,
            'tmp_lahir_ibu' => $request->tmp,
            'pend_ibu' => $request->pendidikan,
            'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data ibu gagal diubah', 'Error');
            return view('ibu.create');
        }
        Alert::success('Data ibu dengan berhasil diubah', 'Sukses');
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
