@extends('layout.app')


@section('body')


<div class="widget">
        <div class="bg jumbotron jumbotron-fluid">

            <div class="container">
                <div class="col col-md-6">
                    <div id="clock">
                        <h1 id="time">10:15:40 AM</h1>
                        <h3><span id="day">MON</span> &nbsp;<span id="utc">10 APRIL 2019</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid">
        <a class="btn btn-success mx-auto" style="margin-right:20px;" href="{{ $url = route('pegawai.create')}}">Tambah Data Pegawai</a>
        <hr>
        <table id="example" class="table table-striped table-light table-bordered" cellspacing="0" width="100%">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nip</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
            <tbody>
                    <?php $i=1; ?>
                    @foreach ($pegawai as $p)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $p->nip_pegawai }}</td>
                        <td style="width: 20%">{{ $p->nama }}</td>
                        <td style="width: 25%">{{ $p->alamat }}</td>
                        <td style="width: 15%">{{ $p->no_telp }}</td>
                        <td style="width: 17%">
                        <a href="{{ $url = route('pegawai.detail', ['nip' => $p->nip_pegawai]) }}" class="btn btn-primary btn-sm">Detail</a>
                            <a href="{{ $url = route('pegawai.edit', ['nip' => $p->nip_pegawai]) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ $url = route('pegawai.destroys', ['nip' => $p->nip_pegawai]) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
            </tbody>
        </table>

    </div>


@endsection