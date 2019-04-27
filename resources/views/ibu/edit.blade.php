@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
    <div class="button-back">
        <a href="{{ $url = route('home') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
        <hr>
    </div>

    <div class="panel panel-info bg-white p-5">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Ibu</h3>
        </div>
        <div class="panel-body">
            @foreach ($data as $ibu)

            <form action="{{ $url = route('ibu.update', ['nip' => $ibu->nip_pegawai]) }}" method="post" class="needs-validation" novalidate>
                    @method('patch')
                    {{ csrf_field() }}
        <input type="hidden" name="id_ibu" value="{{ $ibu->id_ibu }}">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukan nama lengkap" value="{{ $ibu->nama_ibu }}">
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
                            <input type="text" class="form-control @error('tmp') is-invalid @enderror" id="tmp" name="tmp" placeholder="Contoh: Bandung" value="{{ $ibu->tmp_lahir_ibu }}">
                            @error('tmp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col col-md-6">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl"
                                placeholder="Contoh: 1979-03-03" value="{{ $ibu->tgl_lahir_ibu }}">
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
                        placeholder="Contoh: SMA 10 Bandung" value="{{ $ibu->pend_ibu }}">
                        @error('pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
        <button type="submit" class="btn btn-success">Update Data Ibu</button>
		</form>
		@endforeach

    </div>
</div>
</div>

@endsection