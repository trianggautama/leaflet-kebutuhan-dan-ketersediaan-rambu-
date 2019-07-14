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
            <h2 style="text-align:center;">DATA LOKASI RAMBU PADA KECAMATAN {{$kecamatan->nama_kecamatan}}</h2>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan Lokasi</th>
                    <th>Rambu Terkait</th>
                    <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no=1;
                @endphp
                @foreach($kelurahan as $kel)
                        @foreach($kel->lokasi_rambu as $lr)
                        <tr>
                        <td>{{$no++}}</td>
                        <td class="text-center">
                            @if ($lr->status == 2)
                            <label class="badge badge-primary" for=""> Kebutuhan Rambu</label>
                            @else
                            <label class="badge badge-success" for=""> Ketersediaan rambu</label>
                            @endif
                        </td>
                        <td>{{$lr->rambu->nama_rambu}}</td>
                        <td class="text-center">{{$lr->alamat}}</td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tfoot>
            </table>
            <br>
            <br>
            <div class="ttd">
                        <h5> <p>Banjarbaru, {{$tgl}}</p></h5>
                      <h5>{{$pejabat_struktural->jabatan}}</h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline;">{{$pejabat_struktural->nama_pejabat}}</h5>
                      <h5>{{$pejabat_struktural->nip}}</h5>
                      </div>
        </div>
    </div>
</body>

</html>
