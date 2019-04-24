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
 
	@foreach($pasangan as $p)
		<form action="/pegawai/detail/{{$p->nip_pegawai}}/pasangan/update" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $p->id_pasangan }}"> <br/>
			Nama <input type="text" name="nama" value="{{ $p->nama_pasangan }}"> <br/>
            tgl lahir <input type="text" name="tgl_lahir" value="{{ $p->tgl_lahir_pasangan }}"> <br/>
            tmp lahir <input type="text" name="tmp_lahir" value="{{ $p->tmp_lahir_pasangan }}"> <br/>
            pendidikan <input type="text" name="pendidikan" value="{{ $p->pendidikan_pasangan }}"> <br/>
			<input type="submit" value="Simpan Data">
		</form>
		@endforeach
 
</body>
</html>