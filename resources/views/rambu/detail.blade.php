@extends('layouts.admin')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-4 grid-margin ">
            <div class="card">
              <div class="card-body text-center ">
                <h4 class="card-title">Foto Rambu</h4>
              <img src="/images/rambu/{{$rambu->gambar}}" width="250"alt="">
              </div>
              <a href="{{route('rambu_detail_cetak', ['id' => IDCrypt::Encrypt( $rambu->id)])}}" class="btn btn-inverse-info"><i class="mdi mdi-printer"></i> Cetak Data Rambu</a>
            </div>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <br>
                <h4 class="card-title">Keterangan</h4>
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <h5>Kode Rambu :</h5>
                        <hr>
                        <h5>Nama Rambu :</h5>
                        <hr>
                        <h5>Jenis Rambu :</h5>
                        <hr>
                        <h5>Keterangan :</h5>
                    </div>
                    <div class="col-md-9 col-xs-9">
                        <h5>  {{$rambu->kode_rambu}}</h5>
                        <hr>
                        <h5>  {{$rambu->nama_rambu}}</h5>
                        <hr>
                        <h5>  {{$rambu->jenis_rambu->nama_jenis}}</h5>
                        <hr>
                        <h5>  {{$rambu->keterangan}}</h5>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Data Lokasi</h4>
                <div class="table-responsive">
                  <table class="table striped "  id="myTable">
                       <thead>
                          <tr>
                            <th>No</th>
                            <th>Alamat Rambu</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Action</th>
                          </tr>
                      </thead>
                         @php
                            $no=1;
                        @endphp
                      <tbody>
                          @foreach ($lokasi_rambu as $lk)
                          <tr>
                          <td>{{$no++}}</td>
                          <td>{{$lk->alamat}}</td>
                                <td class="text-center" >
                                    @if ($lk->status == 2)
                                     <label class="badge badge-primary" for=""> Kebutuhan Rambu</label>
                                    @else
                                     <label class="badge badge-success" for=""> Ketersediaan rambu</label>
                                    @endif
                                </td>
                                <td class="text-center"><a href="" class="btn btn-inverse-primary" style="padding:8px !important;"><i class=" mdi mdi-eye "></a></td>
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
