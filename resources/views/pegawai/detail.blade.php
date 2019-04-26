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
                                <td>{{ $pegawai['nama'] }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $pegawai['alamat'] }}</td>
                            </tr>

                            <tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ $pegawai['lahir'] }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ $pegawai['jk'] }}</td>
                            </tr>
                            <tr>
                                <td>Nomer Telepon</td>
                                <td>{{ $pegawai['no_telp'] }}</td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>{{ $pegawai['status'] }}</td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>{{ $pegawai['email'] }}</td>
                            </tr>
                            <tr>
                                <td>Golongan Darah </td>
                                <td>{{ $pegawai['gol_darah'] }}</td>
                            </tr>
                            <tr>
                                <td>Agama </td>
                                <td>{{ $pegawai['agama'] }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <a href="#" class="btn btn-primary">My Sales Performance</a>
                    <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
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
                                <td>{{ $pegawai['nama_pasangan'] }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ $pegawai['lahir_pasangan'] }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ $pegawai['pendidikan_pasangan'] }}</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
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
                                <td>{{ $pegawai['nama_anak'] }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ $pegawai['lahir_anak'] }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ $pegawai['pendidikan_anak'] }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>{{ $pegawai['jk_anak'] }}</td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>{{ $pegawai['status_anak'] }}</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
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
                                <td>{{ $pegawai['nama_ayah'] }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ $pegawai['lahir_ayah'] }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ $pegawai['pendidikan_ayah'] }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
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
                                <td>{{ $pegawai['nama_ibu'] }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>{{ $pegawai['lahir_ibu'] }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan </td>
                                <td>{{ $pegawai['pendidikan_ibu'] }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
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
                                <td>{{ $pegawai['nama_perusahaan'] }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi Perusahaan </td>
                                <td>{{ $pegawai['lokasi_perusahaan'] }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan Perusahaan </td>
                                <td>{{ $pegawai['jabatan_perusahaan'] }}</td>
                            </tr>
                            <tr>
                                <td>JPeriode Perusahaan </td>
                                <td>{{ $pegawai['periode_perusahaan'] }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel-footer text-white">
            <span class="pull-right">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                    class="btn btn-primary"><i class="fa fa-refresh"></i> Edit</a>
            </span>
        </div>

    </div>

</div>
@endif







@endsection