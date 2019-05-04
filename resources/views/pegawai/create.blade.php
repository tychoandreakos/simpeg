@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
    <div class="button-back">
        <a href="{{ $url = route('pegawai.index') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
        <hr>
    </div>

    <div class="panel panel-info bg-white p-5">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Data Pegawai</h3>
        </div>
        <div class="panel-body">
            <form action="{{ $url = route('pegawai.store') }}" method="post" class="needs-validation" novalidate>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukan nama lengkap">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                        placeholder="Masukan alamat lengkap">
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col col-md-6">
                            <label for="tmp">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tmp') is-invalid @enderror" id="tmp"
                                name="tmp" placeholder="Contoh: Bandung">
                            @error('tmp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col col-md-6">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl"
                                name="tgl" placeholder="Contoh: 1979-03-03">
                            @error('tgl')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
                        <option value="0">Laki - laki</option>
                        <option value="1">Perempuan</option>
                    </select>
                    @error('jk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomer Telepon</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp"
                        placeholder="Contoh: 087821466890">
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="0">Menikah</option>
                        <option value="1">Belum Menikah</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Contoh: ranimulyanik14@gmail.com">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="goldar">Golongan Darah</label>
                    <select class="form-control @error('goldar') is-invalid @enderror" name="goldar" id="goldar">
                        <option value="0">O</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">AB</option>
                    </select>
                    @error('goldar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                        <option value="0">Islam</option>
                        <option value="1">Kristen</option>
                        <option value="2">Hindu</option>
                        <option value="3">Budha</option>
                    </select>
                    @error('agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Data Pegawai</button>
            </form>

        </div>
    </div>
</div>

@endsection