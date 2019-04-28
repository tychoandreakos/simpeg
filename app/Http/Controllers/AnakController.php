<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Http\Controllers\PegawaiController as Pegawai;

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
        $pegawaiFunction = new Pegawai;

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required|date',
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

            $checking_status = $anak->where('pegawai_nip_pegawai', $request->nip)->get();
            foreach($checking_status as $status){
                if($status->status_anak == $request->status){
                    Alert::error('Data '. strtolower($pegawaiFunction->status_anak($request->status)) .' sudah ada', 'Error');
                    return redirect('pegawai/'. $request->nip .'/detail');
                }
            }


       $saved = $anak->insert([
            'pegawai_nip_pegawai' => $request->nip,
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
            return redirect('pegawai/'. $request->nip .'/detail');
        }
        Alert::success('Data anak berhasil disimpan', 'Sukses');
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
        $anak = DB::table('anak')->where('pegawai_nip_pegawai', $id)->get();
        return view('anak.show', ['anak' => $anak, 'id' => $id]);
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
        $checking = $anak->where('id_anak', $id)->exists();

        if(!$checking){
            Alert::error('Data anak tidak ditemukan', 'Error');
            return redirect('pegawai');
        }

        $data = $anak->where('id_anak', $id)->get();
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
        $pegawaiFunction = new Pegawai;

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tgl' => 'required|date',
            'tmp' => 'required',
            'pendidikan' => 'required',
            'jk' => 'required',
            'status' => 'required',
        ]);

        $checking = $anak->where('id_anak', $id)->exists();
        if(!$checking){
            Alert::error('Data anak tidak ditemukan', 'Error');
            return redirect('pegawai/detail/anak/'. $request->nip .'/show');
        }

       $update = $anak->where('id_anak', $id)->update([
            'nama_anak' => $request->nama,
            'tgl_lahir_anak' => $request->tgl,
            'tmp_lahir_anak' => $request->tmp,
            'pendidikan_anak' => $request->pendidikan,
            'jk_anak' => $request->jk,
            'status_anak' => $request->status,
            'updated_at' => $now
        ]);

        if(!$update){
            Alert::error('Data anak dengan nama '. $request->nama .' gagal diubah', 'Error');
            return redirect('pegawai/detail/anak/'. $request->nip .'/show');
        }
        Alert::success('Data anak dengan nama '. $request->nama .' berhasil diubah', 'Sukses');
        return redirect('pegawai/detail/anak/'. $request->nip .'/show');
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
