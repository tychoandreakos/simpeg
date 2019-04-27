@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
    <div class="button-back">
        <a href="{{ $url = route('home') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
        <hr>
    </div>

    <div class="panel panel-info bg-white p-5">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Anak</h3>
        </div>
        <div class="panel-body">
            @foreach ($data as $anak)

            <form action="{{ $url = route('anak.update', ['nip' => $anak->nip_pegawai]) }}" method="post" class="needs-validation" novalidate>
                    @method('patch')
                {{ csrf_field() }}
                <input type="hidden" name="id_anak" value="{{ $anak->id_anak }}">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukan nama lengkap" value="{{ $anak->nama_anak }}">
                    @error('nama')
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
                                name="tmp" placeholder="Contoh: Bandung" value="{{ $anak->tmp_lahir_anak }}">
                            @error('tmp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col col-md-6">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl"
                                name="tgl" placeholder="Contoh: 1979-03-03" value="{{ $anak->tgl_lahir_anak }}">
                            @error('tgl')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan"
                        name="pendidikan" placeholder="Contoh: SMA 10 Bandung" value="{{ $anak->pendidikan_anak }}">
                    @error('pendidikan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" value="asa">
                    <option value="{{ $anak->jk_anak }}" hidden>{{ $anak->jk_anak }}</option>
                    <option value="0">Laki - laki</option>
                    <option value="1">perempuan</option>
                </select>
                @error('jk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" value="asa">
                <option value="{{ $anak->status_anak }}" hidden>{{ $anak->status_anak }}</option>
                <option value="0">Anak ke 1</option>
                <option value="1">Anak ke 2</option>
                <option value="2">Anak ke 3</option>
                <option value="3">Anak ke 4</option>
                <option value="4">Anak ke 5</option>
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan Anak</button>
        </form>

        @endforeach
    </div>
</div>
</div>

@endsection