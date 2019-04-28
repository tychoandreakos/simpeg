<?php use App\Http\Controllers\PegawaiController; ?>

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
            font-size: 16px;
            margin-top: -5px;
            text-align: center;
            height: 5px;
            text-decoration: underline;
        }

        .data-pribadi {
            font-size: 1.3em;
        }

        h2 {
            font-size: 1.2em;
        }

        p {
            font-size: 0.7em;
        }

        /* table,td,th {
            border: 1px solid #000;
        } */

        td,
        th {
            padding: 5px 25px;
            font-size: 0.7em;
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
                <td style="width: 1%">1.</td>
                <td>NIP</td>
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


        <p class="data-pribadi">II. Data Keluarga</p>
        <p style="font-weight: bold;">1. Orang Tua</p>
        <table>
            <tr>
                <th>Nama Ayah</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Pendidikan</th>
            </tr>

            <tr>
                <td>{{ ucwords($pegawai['nama_ayah']) }}</td>
                <td>{{ ucwords($pegawai['lahir_ayah']) }}</td>
                <td>{{ ucwords($pegawai['pendidikan_ayah']) }}</td>
            </tr>

            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>

            <tr>
                <th>Nama Ibu</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Pendidikan</th>
            </tr>

            <tr>
                <td>{{ ucwords($pegawai['nama_ibu']) }}</td>
                <td>{{ ucwords($pegawai['lahir_ibu']) }}</td>
                <td>{{ ucwords($pegawai['pendidikan_ibu']) }}</td>
            </tr>

        </table>


        <p style="font-weight: bold;">2. Suami / Istri</p>
        <table>
            <tr>
                <th>Nama Suami / Istri</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Pendidikan</th>
                <th>Status</th>
            </tr>

            <tr>
                <td>{{ ucwords($pegawai['nama_pasangan']) }}</td>
                <td>{{ ucwords($pegawai['lahir_pasangan']) }}</td>
                <td>{{ ucwords($pegawai['pendidikan_pasangan']) }}</td>
                <td>{{ ucwords($pegawai['status_pasangan']) }}</td>
            </tr>

        </table>

        <p style="font-weight: bold;">3. Anak</p>
        <table>
            <tr>
                <th>Status</th>
                <th>Nama Anak</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Pendidikan</th>
                <th>Jenis Kelamin</th>
            </tr>

            @foreach($anak as $a)
            <tr>
                <td>{{ PegawaiController::status_anak($a->status_anak) }}</td>
                <td>{{ ucwords($a->nama_anak) }}</td>
                <td>{{ ucwords("$a->tmp_lahir_anak, $a->tgl_lahir_anak") }}</td>
                <td>{{ ucwords("$a->pendidikan_anak") }}</td>
                <td>{{ PegawaiController::jk($a->jk_anak) }}</td>
            </tr>
            @endforeach

        </table>



    </div>
</body>

</html>