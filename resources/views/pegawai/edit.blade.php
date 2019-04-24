<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>

	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Edit Pegawai</h3>

	<a href="/pegawai"> Kembali</a>
	
    <br/>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<br/>

		@foreach($pegawai as $p)
		<form action="/pegawai/update" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="nip" value="{{ $p->nip_pegawai }}"> <br/>
			Nama <input type="text" name="nama" value="{{ $p->nama }}"> <br/>
			alamat<input type="text" name="alamat" value="{{ $p->alamat}}"> <br/>
			Telepon <input type="number" name="no_telp" value="{{ $p->no_telp }}"> <br/>
			<input type="submit" value="Simpan Data">
		</form>
		@endforeach
		

</body>
</html>