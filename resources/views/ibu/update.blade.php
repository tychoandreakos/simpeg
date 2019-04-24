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
 
	@foreach($ibu as $p)
		<form action="/pegawai/detail/{{$p->nip_pegawai}}/ibu/update" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $p->id_ibu }}"> <br/>
			Nama <input type="text" name="nama" value="{{ $p->nama_ibu }}"> <br/>
            tgl lahir <input type="text" name="tgl_lahir" value="{{ $p->tgl_lahir_ibu }}"> <br/>
            tmp lahir <input type="text" name="tmp_lahir" value="{{ $p->tmp_lahir_ibu }}"> <br/>
            pendidikan <input type="text" name="pendidikan" value="{{ $p->pend_ibu }}"> <br/>
			<input type="submit" value="Simpan Data">
		</form>
		@endforeach
 
</body>
</html>