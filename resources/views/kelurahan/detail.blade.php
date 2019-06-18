@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        @include('layouts.errors')
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Data  Lokasi rambu pada kelurahan {{$kelurahan->nama_kelurahan}},</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Data</h4>
                        <div class="text-right">
                            <a href="{{route('kelurahan_ketersediaan_cetak', ['id' => IDCrypt::Encrypt( $kelurahan->id)])}}" class="btn btn-sm btn-inverse-primary mt-2 mt-xl-0"> <i class=" mdi mdi-printer "></i> Cetak data Ketersediaan Rambu</a>
                            <a href="{{route('kelurahan_kebutuhan_cetak', ['id' => IDCrypt::Encrypt( $kelurahan->id)])}}" class="btn btn-sm btn-inverse-info mt-2 mt-xl-0"> <i class=" mdi mdi-printer "></i> Cetak data kebutuhan Rambu</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan Lokasi</th>
                                        <th>Rambu Terkait</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($lokasi_rambu as $lr)
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
                                        <td class="text-center">
                                            <a href="{{route('map_detail', ['id' => IDCrypt::Encrypt( $lr->id)])}}" class="btn btn-inverse-success " style="padding:6px !important;">
                                                <i class=" mdi mdi-eye "></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection