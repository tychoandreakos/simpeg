<?php use App\Http\Controllers\PegawaiController; ?>
@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
<h4>Menampilkan seluruh data anak dengan NIP : <a href="{{ $url = route('pegawai.detail', ['nip' => $id]) }}">{{ $id }}</a> </h4>
        <a class="btn btn-success mx-auto" style="margin-right:20px;" href="{{ $url = route('anak.add', ['nip' => $id]) }}">Tambah Data Anak</a>
        <hr>
        <table id="example" class="table table-striped table-light table-bordered" cellspacing="0" width="100%">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat, Tanggal Lahir</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
            <tbody>
                    <?php $i=1; ?>
                    @foreach ($anak as $p)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td style="width: 15%">{{ $p->pegawai_nip_pegawai }}</td>
                        <td style="width: 15%">{{ $p->nama_anak }}</td>
                        <td style="width: 15%">{{ "$p->tmp_lahir_anak, $p->tgl_lahir_anak" }}</td>
                        <td style="width: 15%">{{ $p->pendidikan_anak }}</td>
                        <td style="width: 5%">{{ PegawaiController::jk($p->jk_anak) }}</td>
                        <td style="width: 10%">{{ PegawaiController::status_anak($p->status_anak) }}</td>
                        <td style="width: 14%">
                            <a href="{{ $url = route('anak.edit', ['nip' => $p->id_anak]) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ $url = route('anak.destroys', ['id' => $p->id_anak, 'nip' => $p->pegawai_nip_pegawai]) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
            </tbody>
        </table>

    </div>


    @endsection