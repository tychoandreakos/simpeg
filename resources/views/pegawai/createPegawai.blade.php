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
 
	<form action="/pegawai/store" method="post">
        {{ csrf_field() }}
		Nama <input type="text" name="nama"> <br/>
		Alamat <input type="text" name="alamat"> <br/>
		No_telp <input type="number" name="no_telp"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>