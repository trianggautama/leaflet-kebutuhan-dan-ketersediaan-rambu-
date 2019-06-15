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
            background-color: darkslategray;
            text-align: center;
            color: aliceblue;
        }

        td {
            padding-left: 3px;
        }

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

        .tgl {
            width: 100%;
            text-align: right;
            margin-top: 0px;
            margin-bottom: 50px;
            margin-right: 10%;
        }

        .gambar {
            float: left;
            margin-right: 20px;
        }

        .keterangan {
            float: right;
            font-family: sans-serif;
        }

        .card {
            height: 300px;
        }

        .container {
            margin-top: 5px;
            padding-top: 3px;
        }

        .isi {
            margin: 0px;
        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="images/pemko.jpg">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">PEMERINTAH KOTA BANJARBARU</h3>
            <h1 style="margin:0px;">DINAS PERHUBUNGAN</h1>
            <p style="margin:0px;">Alamat : Jl.Jend Sudirman No.3 Telp.(0511)6749034 Banjarbaru 70713</p>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="isi">

            <h2 style="text-align:center; margin:5px;">DATA RAMBU </h2>

            <table style="margin-bottom:20px;">
                <tr>
                    <td style="width:260px;  text-align: center;">
                        <img style="width:200px; height:auto margin:auto;" src="images/rambu/{{$rambu->gambar}}">
                    </td>
                    <td style="padding-left:20px !mportant; border:none;">
                        <h5>Kode Rambu : {{$rambu->kode_rambu}}</h5>
                        <h5>Nama Rambu : {{$rambu->nama_rambu}}</h5>
                        <h5>Jenis Rambu : {{$rambu->jenis_rambu->nama_jenis}}</h5>
                        <h5>Keterangan &nbsp : {{$rambu->keterangan}}</h5>
                    </td>
                </tr>
            </table>
            <h4>Lokasi Rambu & Kebutuhan Rambu</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>kelurahan</th>
                        <th>alamat</th>
                        <th>Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasi_rambu as $lr)

                    <tr>
                        <td>{{$lr->kelurahan->nama_kelurahan}}</td>
                        <td>{{$lr->alamat}}</td>
                        <td class="text-center" style="  text-align: center;"> @if ($lr->status == 2)
                            <p style="color:red;"> tidak terpasang</p>
                            @else
                            <p>terpasang</p>
                            @endif</td>
                    </tr>
                    @endforeach
                    </tfoot>
            </table>
            <br>
            <br>
            <div class="ttd">
                <h5>
                    <p>Banjarbaru, {{$tgl}}</p>
                </h5>
                <h5>Kasi Reksa</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline;">Nama Pejabat</h5>
                <h5>Nip</h5>
            </div>
        </div>

    </div>

</body>

</html>
