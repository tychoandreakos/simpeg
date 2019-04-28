@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
<h4>Menampilkan seluruh data pekerjaan dengan NIP : <a href="{{ $url = route('pegawai.detail', ['nip' => $id]) }}">{{ $id }}</a> </h4>
        <a class="btn btn-success mx-auto" style="margin-right:20px;" href="{{ $url = route('pekerjaan.add', ['nip' => $id]) }}">Tambah Data pekerjaan</a>
        <hr>
        <table id="example" class="table table-striped table-light table-bordered" cellspacing="0" width="100%">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
            <tbody>
                    <?php $i=1; ?>
                    @foreach ($pekerjaan as $p)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td style="width: 15%">{{ $p->pegawai_nip_pegawai }}</td>
                        <td style="width: 15%">{{ $p->nama_perusahaan }}</td>
                        <td style="width: 15%">{{ $p->lokasi_perusahaan }}</td>
                        <td style="width: 15%">{{ $p->jabatan_perusahaan }}</td>
                        <td style="width: 5%">{{ $p->periode_perusahaan }}</td>
                        <td style="width: 14%">
                            <a href="{{ $url = route('pekerjaan.edit', ['nip' => $p->id_pekerjaan]) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ $url = route('pekerjaan.destroys', ['id' => $p->id_pekerjaan, 'nip' => $p->pegawai_nip_pegawai]) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
            </tbody>
        </table>

    </div>


    @endsection