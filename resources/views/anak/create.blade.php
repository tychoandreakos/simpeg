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
 
	<form action="/pegawai/detail/{{$nip}}/anak/create" method="post">
        {{ csrf_field() }}
		Nama <input type="text" name="nama"> <br/>
		tgl lahir <input type="text" name="tgl_lahir"> <br/>
        tmp lahir <input type="text" name="tmp_lahir"> <br/>
        pendidikan <input type="text" name="pendidikan"> <br/>
       jk <input type="text" name="jk"> <br/>
        status <input type="text" name="status"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>