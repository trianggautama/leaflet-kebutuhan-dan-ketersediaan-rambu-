@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Laporan Masyarakat,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('layouts.errors')
                        <h4 class="card-title">Tabel Data</h4>
                        <div class="text-right">
                            <a href="/" class="btn btn-sm btn-inverse-info btn-icon-text" data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-printer "></i> tabah data</a>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table striped " id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nomor Tlp</th>
                                                <th class="text-center">tanggal</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no=1;
                                            @endphp
                                            @foreach ($laporan_masyarakat as $lm)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$lm->nama}}</td>
                                                <td>{{$lm->no_hp}}</td>
                                                <td class="text-center">{{$lm->created_at->format('d-m-Y')}}</td>
                                                <td>
                                                    @if($lm->status == 0)
                                                    <span class="badge badge-warning">Pesan Baru</span>
                                                    @else
                                                    <span class="badge badge-primary">Sudah Dibaca</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('laporan_masyarakat_show', ['id' => IDCrypt::Encrypt( $lm->id)])}}"
                                                        class="btn btn-inverse-success "
                                                        style="padding:6px !important;"> <i
                                                            class=" mdi mdi-eye "></i></a>
                                                    <button type="button" class="btn btn-inverse-danger"
                                                        style="padding:6px !important;" onclick=""><b><i
                                                                class="mdi mdi-delete"></i></b></button>
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
        </div>

        <!-- content-wrapper ends -->
        @endsection
