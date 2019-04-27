@extends('layout.app')


@section('body')

<div class="container-fluid mt-5">
    <div class="button-back">
        <a href="{{ $url = route('home') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
        <hr>
    </div>

    <div class="panel panel-info bg-white p-5">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Riwayat Pekerjaan</h3>
        </div>
        <div class="panel-body">
			@foreach ($data as $pekerjaan)

            <form action="{{ $url = route('pekerjaan.update', ['nip' => $pekerjaan->nip_pegawai]) }}" method="post" class="needs-validation" novalidate>
                @method('patch')
                {{ csrf_field() }}
        <input type="hidden" name="id_pekerjaan" value="{{ $pekerjaan->id_pekerjaan }}">
                <div class="form-group">
                    <label for="nama">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukan nama lengkap" value="{{ $pekerjaan->nama_perusahaan }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col col-md-6">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" placeholder="Contoh: Bandung" value="{{ $pekerjaan->lokasi_perusahaan }}">
                            @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col col-md-6">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"
                                placeholder="Contoh: 1979-03-03" value="{{ $pekerjaan->jabatan_perusahaan }}">
                                @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode" name="periode"
                        placeholder="Contoh: SMA 10 Bandung" value="{{ $pekerjaan->periode_perusahaan }}">
                        @error('periode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
        <button type="submit" class="btn btn-success">Update Data Riwayat Pekerjaan</button>
		</form>
		@endforeach

    </div>
</div>
</div>

@endsection