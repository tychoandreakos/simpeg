@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
    <div class="button-back">
        <a href="{{ $url = route('pegawai.index') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
        <hr>
    </div>

    <div class="panel panel-info bg-white p-5">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Pegawai</h3>
        </div>
        <div class="panel-body">
            @foreach ($data as $pegawai)

            <form action="{{ $url = route('pegawai.update', ['nip' => $pegawai->nip_pegawai]) }}" method="post"
                class="needs-validation" novalidate>
                @method('patch')
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukan nama lengkap" value="{{ $pegawai->nama }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" placeholder="Masukan alamat lengkap" value="{{ $pegawai->alamat }}">
                    @error('alamat')
                    <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col col-md-6">
                    <label for="tmp">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tmp') is-invalid @enderror" id="tmp" name="tmp"
                        placeholder="Contoh: Bandung" value="{{ $pegawai->tmp_lahir }}">
                            @error('tmp')
                            <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col col-md-6">
                <label for="tgl">Tanggal Lahir</label>
                <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl"
                    placeholder="Contoh: 1979-03-03" value="{{ $pegawai->tgl_lahir }}">
                            @error('tgl')
                            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="jk">Jenis Kelamin</label>
    <select class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
	<option value="{{ $pegawai->jk }}" hidden>{{ $pegawai->jk }}</option>
        <option value="0">Suami</option>
        <option value="1">Istri</option>
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
        placeholder="Contoh: 087821466890" value="{{ $pegawai->no_telp }}">
                    @error('no_telp')
                    <div class=" invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>
<div class="form-group">
    <label for="status">Status</label>
	<select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
			<option value="{{ $pegawai->status }}" hidden>{{ $pegawai->status }}</option>
        <option value="0">Suami</option>
        <option value="1">Istri</option>
    </select>
    @error('status')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
        placeholder="Contoh: ranimulyanik14@gmail.com" value="{{ $pegawai->email }}">
                    @error('email')
                    <div class=" invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>
<div class="form-group">
    <label for="goldar">Golongan Darah</label>
	<select class="form-control @error('goldar') is-invalid @enderror" name="goldar" id="goldar">
			<option value="{{ $pegawai->gol_darah }}" hidden>{{ $pegawai->gol_darah }}</option>
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
			<option value="{{ $pegawai->agama }}" hidden>{{ $pegawai->agama }}</option>
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

<button type="submit" class="btn btn-success">Update Data Pegawai</button>
</form>
@endforeach
</div>
</div>
</div>

@endsection