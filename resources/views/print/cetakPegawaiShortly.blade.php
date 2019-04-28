<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Print</title>
	<style>
		body {
			margin: 0;
		}

		.layout {
			margin-left: 50px;
		}


		.title-biodata {
			font-size: 18px;
            margin-top: -5px;
			text-align: center;
            height: 5px;
			text-decoration: underline;
		}

		.data-pribadi {
			font-size: 1.2em;
		}

		h2 {
			font-size: 1.3em;
		}

		p {
			font-size: 0.8em;
		}

		/* table,td,th {
            border: 1px solid #000;
        } */

		td,
		th {
			padding: 5px 25px;
			font-size: 0.8em;
		}

		.header {
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="layout">
		<div class="header">
			<h2>PT. NUR RAHAYU METAL</h2>
			<p>
				<span>( QUALITY WELDING TECHNIQUES & MECHANICAL WOOD )</span><br>
				<span>JL CINGISED Block c Kav 17 RT02 / RW04 CISARANTEN ENDAH KOTA BANDUNG </span><br>
				<span>022 - 63728141 / pt.nurrahayumetal07@gmail.com</span>
			</p>
			<p></p>
		</div>
		<p class="title-biodata">Biodata Karyawan</p>
		<p class="data-pribadi">I. Data Pribadi</p>
		<table>

			<tr>
				<td>1.</td>
				<td>NIK</td>
				<td>:</td>
				<td>
                {{ $pegawai['nip'] }}
				</td>
			</tr>

			<tr>
				<td>2.</td>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
                {{ ucwords($pegawai['nama']) }}
				</td>
			</tr>

			<tr>
				<td>3.</td>
				<td>Alamat</td>
				<td>:</td>
				<td>
					{{ ucwords($pegawai['alamat']) }}
				</td>
			</tr>

			<tr>
				<td>4.</td>
				<td>Tempat, Tanggal Lahir</td>
				<td>:</td>
				<td>
					{{ ucwords($pegawai['lahir']) }}
				</td>
			</tr>

			<tr>
				<td>5.</td>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					{{ ucwords($pegawai['jk']) }}
				</td>
			</tr>

			<tr>
				<td>6.</td>
				<td>Nomer Telepon</td>
				<td>:</td>
				<td>
					{{ ucwords($pegawai['no_telp']) }}
				</td>
			</tr>

			<tr>
				<td>7.</td>
				<td>Status</td>
				<td>:</td>
				<td>
                    {{ ucwords($pegawai['status']) }}
				</td>
			</tr>

			<tr>
				<td>8.</td>
				<td>Email</td>
				<td>:</td>
				<td>
                    {{ ucwords($pegawai['email']) }}
			</tr>

			<tr>
				<td>9.</td>
				<td>Golongan Darah</td>
				<td>:</td>
				<td>
                    {{ ucwords($pegawai['gol_darah']) }}
				</td>
			</tr>

			<tr>
				<td>10.</td>
				<td>Agama</td>
				<td>:</td>
				<td>
					{{ ucwords($pegawai['agama']) }}
				</td>
			</tr>


		</table>
	</div>
</body>

</html>