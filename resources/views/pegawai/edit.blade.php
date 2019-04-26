<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
  </head>
  <body>


<div class="container-fluid mt-5">

<div class="add-data">
		@foreach($pegawai as $p)
		{{ csrf_field() }}
		<form action="/pegawai/update" method="post">
			<a href="index.html" class="back"><i class="fa fa-arrow-left"></i> Kembali</a>
			<hr>
			<h1>Edit Data Pegawai</h1>

			<fieldset>
			<input type="hidden" name="nip" value="{{ $p->nip_pegawai }}">

			<div class="form-group">
				<label for="nama">Nama</label>
			<input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $p->nama }}" required>
			</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" value="{{ $p->nama }}" required></textarea>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="tmp">Tempat Lahir</label>
							<input type="text" id="tmp" name="nm" placeholder="Contoh : Bandung" value="{{ $p->tmp_lahir }}" required>
						</div>
						<div class='col-md-6'>
							<label for="tgl">Tanggal Lahir</label>
							<div class='input-group date' id='tgl'>
								<input type='text' class="form-control" placeholder="03/23/2019" value="{{ $p->tgl_lahir }}" required />
								<span class="input-group-addon">
								</span>

							</div>
						</div>


					</div>
					<div class="form-group">
						<div class="row">
							<div class="col col-md-6">
								<label>Jenis Kelamin</label>
								<input type="radio" id="laki" value="laki" name="jk"><label for="laki"
									class="light">Laki - Laki</label><br>
								<input type="radio" id="perempuan" value="perempuan" name="jk"><label
									for="perempuan" class="light">Perempuan</label>
							</div>

							<div class="col col-md-6">
									<label>Status</label>
									<input type="radio" id="m" value="0" name="status"><label for="m"
										class="light">Sudah Menikah</label><br>
									<input type="radio" id="tm" value="1" name="status"><label
										for="tm" class="light">Belum Menikah</label>
								</div>
						</div>

					</div>

					<label for="telp">Nomer Telepon</label>
					<input type="text" id="telp" name="telp" name="no_telp" placeholder="Masukkan Nomer Telepon" value="{{ $p->no_telp }}" required>

					<label for="email">Email</label>
					<input type="email" id="email" name="email" placeholder="Masukkan Email" value="{{ $p->email }}" required>

					<div class="form-group">
						<div class="row">
						<div class="col col-md-6">
								<label for="goldar">Golongan Darah</label>
								<select id="goldar" name="goldar">
										<option value="0">A</option>
										<option value="1">B</option>
										<option value="2">AB</option>
										<option value="3">O</option>
								</select>
						</div>

						<div class="col col-md-6">
								<label for="goldar">Agama</label>
								<select id="goldar" name="goldar">
										<option value="0">Islam</option>
										<option value="1">Kristen</option>
										<option value="2">Hindu</option>
										<option value="3">Budha</option>
								</select>
						</div>
					</div>
					</div>
			<button type="submit">Update Pegawai</button>
		</form>
		@endforeach
	</div>

	</body>
	</html>