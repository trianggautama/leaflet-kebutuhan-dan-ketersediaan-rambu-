@extends('layouts.admin')

@section('title', __('outlet.list'))

@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body text-center ">
                <h4 class="card-title">Foto Rambu</h4>
              <img src="/images/rambu/{{$rambu->gambar}}" width="250"alt="">
              </div>
            </div>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Keterangan</h4>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Kode Rambu :</h5>
                        <hr>
                        <h5>Nama Rambu :</h5>
                        <hr>
                        <h5>Jenis Rambu :</h5>
                        <hr>
                        <h5>Keterangan :</h5>
                    </div>
                    <div class="col-md-9">
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
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Jl.R.O.Ulin depan Jlaan Pendidikan</td>
                                            <td class="text-center" ><a href="" class="btn btn-sm btn-primary btn-rounded">Titik Ketersediaan Rambu</a></td>
                                            <td class="text-center"><a href="" class="btn btn-secondary"><i class=" mdi mdi-eye "></a></td>
                                        </tr>
                                        <tr>
                                                <td>2</td>
                                                <td>Jl.Sei Sumba</td>
                                                <td class="text-center"><a href="" class="btn btn-sm btn-success btn-rounded">Titik Kebutuhan Rambu</a></td>
                                                <td  class="text-center"><a href="" class="btn btn-secondary"><i class=" mdi mdi-eye "></a></td>
                                            </tr>
                                    </tbody>
                                </table>

                                </div>
                              </div>
                  </div>
        </div>
    </div>
    </div>


@endsection
