<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang Di Aplikasi Pegwai</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container mt-5">
   
        @if(session('pesan'))
        {{session('pesan')}}
        @endif
    <table class="table table-borderless">
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
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>
                    <a href="pegawai/detail/{{ $p->nip_pegawai }}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="pegawai/edit/{{ $p->nip_pegawai }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="pegawai/hapus/{{ $p->nip_pegawai }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </div>
    </table>



</body>

</html>