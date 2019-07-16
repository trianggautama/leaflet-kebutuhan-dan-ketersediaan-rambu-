<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {}

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #708090;
        }

        th {
            text-align: center;
        }

        td {}

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }

        .pemko {
            width: 70px;
        }

        .logo {
            float: left;
            margin-right: 0px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;

        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        .text-center{
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
        <img  class="pemko" src="images/pemko.jpg"  >
            </div>
            <div class=" headtext">
            <h3 style="margin:0px;">PEMERINTAH KOTA BANJARBARU</h3>
            <h1 style="margin:0px;">DINAS PERHUBUNGAN</h1>
            <p style="margin:0px;">Alamat : Jl.Jend Sudirman No.3 Telp.(0511)6749034 Banjarbaru 70713</p>
        </div>
        <hr>

    </div>

    <div class="container">
        <div class="isi">
            <table>
                <tr>
                    <td style=" border: 1px solid #fff;">
                        Kepada
                    </td>
                    <td style=" border: 1px solid #fff;">
                        :Kepala Dinas Perhubungan Kota Banjarbaru
                    </td>
                </tr>
                <tr>
                    <td style=" border: 1px solid #fff;">
                        Dari
                    </td>
                    <td style=" border: 1px solid #fff;">
                        :Kepala Bidang Lalu Lintas Angkutan Jalan
                    </td>
                </tr>
                <tr>
                    <td style=" border: 1px solid #fff;">
                        Nomor
                    </td>
                    <td style=" border: 1px solid #fff;">
                        :&nbsp;&nbsp; &nbsp; / LLAJ-Reksa / 2018
                    </td>
                </tr>
                <tr>
                    <td style=" border: 1px solid #fff;">
                        tanggal
                    </td>
                    <td style=" border: 1px solid #fff;">
                        :&nbsp; {{$tgl}}
                    </td>
                </tr>
                <tr>
                    <td style=" border: 1px solid #fff;">
                        perihal
                    </td>
                    <td style=" border: 1px solid #fff;">
                        :Survey Rehabilitasi/Pemeliharaan Rambu Lalu-lintas
                    </td>
                </tr>
            </table>
            <p style="text-align:justify">Sehubungan telah dilaksanakannya perjalanan dinas dalam daerah dalam rangka Kegiatan Survey Rehabilitasi/ pemeliharaan
                Rambu Lalu-lintas di Bidang Perhubungan di seluruh wilayah yang ada di
                Kelurahan {{$lokasi_rambu->kelurahan->nama_kelurahan }} Kota Banjarbaru , maka dengan ini di sampaikan
                laporan perjalanan dinas sebagai berikut :</p>
            <ol>
                <li>DASAR <br>
                    Persetujuan Kepala Dinas Perhubungan Atas Telaahan Staf Kepala Bidang LLAJ Nomor :
                    &nbsp;&nbsp;&nbsp; /LLAJ-Reksa

                </li>
                <li style="margin-top:20px; text-align:justify">HASIL SURVEY <br>
                    Survey Pengadaan Rambu Jalan yang berada di Kelurahan {{$lokasi_rambu->kelurahan->nama_kelurahan }}
                    Kecamatan {{$lokasi_rambu->kelurahan->kecamatan->nama_kecamatan }}.
                    Berdasarkan hasil survey dan rekayasa lalu lintas Di Perlukan Rehabilitasi pada rambu lalu lintas sebagai berikut;
                </li>
            </ol>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No </th>
                        <th>Nama Rambu</th>
                        <th>Alamat</th>
                        <th>Koordinat</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{$lokasi_rambu->rambu->nama_rambu}}</td>
                        <td>{{$lokasi_rambu->alamat}}</td>
                        <td class="text-center">{{$lokasi_rambu->longitude}},{{$lokasi_rambu->latitude}}</td>
                        <td class="text-center">
                        @if ($lokasi_rambu->ketersediaan_rambu->kondisi == 1)
                                        <span class="badge badge-success">Baik</span>
                                        @elseif ($lokasi_rambu->ketersediaan_rambu->kondisi == 2)
                                        <label class="badge badge-warning" for=""> Perlu Rehab</label>
                                        @else
                                        <label class="label-danger" for=""> Hilang</label>
                                        @endif
                        </td>
                    </tr>
                    </tfoot>
            </table>
            <p>Demikian kami sampaikan mohon arahan dan petunjuk berikutnya.</p>
        </div>
        <br>
        <br>
        <div class="ttd">
            <h5>
                <p>Banjarbaru, {{$tgl}}</p>
            </h5>
            <h5>{{$pejabat_struktural->jabatan}}</h5>
            <br>
            <br>
            <h5 style="text-decoration:underline;">{{$pejabat_struktural->nama_pejabat}}</h5>
            <h5>{{$pejabat_struktural->nip}}</h5>
        </div>
    </div>

</body>

</html>
