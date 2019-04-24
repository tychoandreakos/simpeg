<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Data Pegawai</h3>
 
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
 
	@foreach($pekerjaan as $p)
		<form action="/pegawai/detail/{{$p->nip_pegawai}}/pekerjaan/update" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $p->id_pekerjaan }}"> <br/>
			Nama <input type="text" name="nama" value="{{ $p->nama_perusahaan}}"> <br/>
            lokasi <input type="text" name="lokasi" value="{{ $p->lokasi_perusahaan}}"> <br/>
            jabatan lahir <input type="text" name="jabatan" value="{{ $p->jabatan_perusahaan}}"> <br/>
            periode <input type="text" name="periode" value="{{ $p->periode_perusahaan}}"> <br/>
			<input type="submit" value="Simpan Data">
		</form>
		@endforeach
 
</body>
</html>