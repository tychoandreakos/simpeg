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
 
	<form action="/pegawai/detail/{{$nip}}/pekerjaan/create" method="post">
        {{ csrf_field() }}
		Nama <input type="text" name="nama"> <br/>
		lokasi <input type="text" name="lokasi"> <br/>
        jabatan <input type="text" name="jabatan"> <br/>
        periode <input type="text" name="periode"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>