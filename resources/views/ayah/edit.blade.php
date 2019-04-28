@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
    <div class="button-back">
        <a href="{{ $url = route('pegawai.index') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
        <hr>
    </div>

    <div class="panel panel-info bg-white p-5">
        <div class="panel-heading">
            <h3 class="panel-title">Update Data Ayah</h3>
        </div>
        <div class="panel-body">
            @foreach ($data as $ayah)

            <form action="{{ $url = route('ayah.update', ['nip' => $ayah->nip_pegawai]) }}" method="post" class="needs-validation" novalidate>
                    @method('patch')
                    {{ csrf_field() }}
        <input type="hidden" name="id_ayah" value="{{ $ayah->id_ayah }}">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                placeholder="Masukan nama lengkap" value="{{ $ayah->nama_ayah }}">
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
                            <input type="text" class="form-control @error('tmp') is-invalid @enderror" id="tmp" name="tmp" placeholder="Contoh: Bandung" value="{{ $ayah->tmp_lahir_ayah }}">
                            @error('tmp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col col-md-6">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl"
                                placeholder="Contoh: 1979-03-03" value="{{ $ayah->tgl_lahir_ayah }}">
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
                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan"
                        placeholder="Contoh: SMA 10 Bandung" value="{{ $ayah->pend_ayah }}">
                        @error('pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
        <button type="submit" class="btn btn-success">Update Data ayah</button>
		</form>
		@endforeach

    </div>
</div>
</div>

@endsection