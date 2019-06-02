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
                <h2>Beranda,</h2>
                <p class="mb-md-0">Selamat datang di beranda admin</p>
              </div>
              <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Beranda&nbsp;/&nbsp;</p>
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
                        <a href="/" class="btn btn-sm btn-inverse-primary btn-icon-text" data-toggle="modal" data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> tabah data</a>
                        <a href="/" class="btn btn-sm btn-inverse-info btn-icon-text" data-toggle="modal" data-target="#exampleModalCenter"> <i class=" mdi mdi-printer "></i> tabah data</a>
                        </div>
                        <br>
                       <div class="row">
                       <div class="col-md-2">
                       <a href="" class="btn btn-block btn-secondary " style="padding:6px !important;"> <i class=" mdi mdi-eye "></i> Kotak Masuk</a>
                       </div>
                       <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table striped "  id="myTable">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Nomor Tlp</th>
                                  <th class="text-center">tanggal</th>
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
                                  <td class="text-center">{{$lm->created_at}}</td>
                                      <td class="text-center">
                                          <a href="" class="btn btn-inverse-success " style="padding:6px !important;"> <i class=" mdi mdi-eye "></i></a>
                                          <button type="button" class="btn btn-inverse-danger" style="padding:6px !important;"
                                          onclick=""><b><i class="mdi mdi-delete"></i></b></button>
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
