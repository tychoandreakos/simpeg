@extends('layout.app')

@section('body')


<div class="container-fluid mt-5">
    <div class="button-back">
            <a href="{{ $url = route('home') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
            <hr>
    </div>
     
    <div class="panel panel-info bg-white p-5">

        <div class="panel-heading">
            <h3 class="panel-title">Detail pegawai</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"
                        src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
                        class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nip</td>
                                <td>{{ $pegawai['nip'] }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ ucfirst($pegawai['nama']) }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ ucfirst($pegawai['alamat']) }}</td>
                            </tr>

                            <tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ ucfirst($pegawai['lahir']) }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ ucfirst($pegawai['jk']) }}</td>
                            </tr>
                            <tr>
                                <td>Nomer Telepon</td>
                                <td>{{ ucfirst($pegawai['no_telp']) }}</td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>{{ ucfirst($pegawai['status']) }}</td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>{{ ucfirst($pegawai['email']) }}</td>
                            </tr>
                            <tr>
                                <td>Golongan Darah </td>
                                <td>{{ ucfirst($pegawai['gol_darah']) }}</td>
                            </tr>
                            <tr>
                                <td>Agama </td>
                                <td>{{ ucfirst($pegawai['agama']) }}</td>
                            </tr>

                        </tbody>
                    </table>
                    
                    @if (is_null($pegawai['id_pasangan']) && is_null($pegawai['id_anak']) && is_null($pegawai['id_ayah']) && is_null($pegawai['id_ibu']) && is_null($pegawai['id_pekerjaan']))
                    <p class="text-danger">Data yang belum lengkap: </p>
                    @endif

                    @if (!is_null($pegawai['id_pasangan']) && !is_null($pegawai['id_anak']) && !is_null($pegawai['id_ayah']) && !is_null($pegawai['id_ibu']) && !is_null($pegawai['id_pekerjaan']))
                    <p class="text-success"><i class="fa fa-check"></i> Data sudah lengkap. </p>
                    @endif


                    {{-- button lengkapi data --}}
                    @if (is_null($pegawai['id_pasangan']))
                    <a href="{{ $url = route('pasangan.add', ['nip' => $pegawai['nip']]) }}" class="btn btn-primary btn-sm">Lengkapi Data Pasangan</a>
                    @endif 

                    @if (is_null($pegawai['id_anak']))
                    <a href="{{ $url = route('anak.add', ['nip' => $pegawai['nip']]) }}" class="btn btn-primary btn-sm">Lengkapi Data Anak</a>
                    @endif 

                    @if (is_null($pegawai['id_ayah']))
                    <a href="{{ $url = route('ayah.add', ['nip' => $pegawai['nip']]) }}" class="btn btn-primary btn-sm">Lengkapi Data Ayah</a>
                    @endif 

                    @if (is_null($pegawai['id_ibu']))
                    <a href="{{ $url = route('ibu.add', ['nip' => $pegawai['nip']]) }}" class="btn btn-primary btn-sm">Lengkapi Data Ibu</a>
                    @endif 

                    @if (is_null($pegawai['id_pekerjaan']))
                    <a href="{{ $url = route('pekerjaan.add', ['nip' => $pegawai['nip']]) }}" class="btn btn-primary btn-sm">Lengkapi Data Pekerjaan</a>
                    @endif 

                </div>
            </div>
        </div>
        <div class="panel-footer text-white mt-3">
            <span class="pull-right">
            <a href="{{ $url = route('edit_pegawai', ['nip' => $pegawai['nip']]) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Edit</a>
                <a href="{{ $url = route('hapus_pegawai', ['nip' => $pegawai['nip']]) }}" data-original-title="Remove this user" data-toggle="tooltip" type="button"
                    class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Hapus</a>
            </span>
        </div>

    </div>

</div>

{{-- pasangan --}}
@if (!is_null($pegawai['id_pasangan']))
<div class="container-fluid mt-5">
    <div class="panel panel-info bg-white p-5">

        <div class="panel-heading">
            <h3 class="panel-title">Pasangan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"
                        src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
                        class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nama </td>
                                <td>{{ ucfirst($pegawai['nama_pasangan']) }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ ucfirst($pegawai['lahir_pasangan']) }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ ucfirst($pegawai['pendidikan_pasangan']) }}</td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>{{ ucfirst($pegawai['status_pasangan']) }}</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="{{ $url = route('pasangan.edit', ['id' => $pegawai['nip']]) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-primary"><i class="fa fa-refresh"></i> Edit</a>
            </span>
        </div>

    </div>

</div>
@endif



{{-- Anak --}}
@if (!is_null($pegawai['id_anak']))
<div class="container-fluid mt-5">
    <div class="panel panel-info bg-white p-5">

        <div class="panel-heading">
            <h3 class="panel-title">Anak</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"
                        src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
                        class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nama </td>
                                <td>{{ ucfirst($pegawai['nama_anak']) }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ ucfirst($pegawai['lahir_anak']) }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ ucfirst($pegawai['pendidikan_anak']) }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>{{ ucfirst($pegawai['jk_anak']) }}</td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>{{ ucfirst($pegawai['status_anak']) }}</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
            <a href="{{ $url = route('anak.edit', ['nip' => $pegawai['nip']]) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-primary"><i class="fa fa-refresh"></i> Edit</a>
            </span>
        </div>

    </div>

</div>
@endif


{{-- Ayah --}}
@if (!is_null($pegawai['id_ayah']))
<div class="container-fluid mt-5">
    <div class="panel panel-info bg-white p-5">

        <div class="panel-heading">
            <h3 class="panel-title">Ayah</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"
                        src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
                        class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nama Ayah </td>
                                <td>{{ ucfirst($pegawai['nama_ayah']) }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ ucfirst($pegawai['lahir_ayah']) }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ ucfirst($pegawai['pendidikan_ayah']) }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="{{ $url = route('ayah.edit', ['nip' => $pegawai['nip']]) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-primary"><i class="fa fa-refresh"></i> Edit</a>
            </span>
        </div>

    </div>

</div>
@endif

{{-- Ibu --}}
@if (!is_null($pegawai['id_ibu']))
<div class="container-fluid mt-5">
    <div class="panel panel-info bg-white p-5">

        <div class="panel-heading">
            <h3 class="panel-title">Ibu</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"
                        src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
                        class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nama ibu </td>
                                <td>{{ ucfirst($pegawai['nama_ibu']) }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ ucfirst($pegawai['lahir_ibu']) }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ ucfirst($pegawai['pendidikan_ibu']) }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="{{ $url = route('ibu.edit', ['nip' => $pegawai['nip']]) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-primary"><i class="fa fa-refresh"></i> Edit</a>
            </span>
        </div>

    </div>

</div>
@endif


{{-- Riwayat Pekerjaan --}}
@if (!is_null($pegawai['id_pekerjaan']))
<div class="container-fluid mt-5">
    <div class="panel panel-info bg-white p-5">

        <div class="panel-heading">
            <h3 class="panel-title">Riwayat Pekerjaan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"
                        src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
                        class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Nama Perusahaan </td>
                                <td>{{ ucfirst($pegawai['nama_perusahaan']) }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi Perusahaan </td>
                                <td>{{ ucfirst($pegawai['lokasi_perusahaan']) }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan Perusahaan </td>
                                <td>{{ ucfirst($pegawai['jabatan_perusahaan']) }}</td>
                            </tr>
                            <tr>
                                <td>Periode Perusahaan </td>
                                <td>{{ ucfirst($pegawai['periode_perusahaan']) }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="{{ $url = route('pekerjaan.edit', ['nip' => $pegawai['nip']]) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-primary"><i class="fa fa-refresh"></i> Edit</a>
            </span>
        </div>

    </div>

</div>
@endif







@endsection