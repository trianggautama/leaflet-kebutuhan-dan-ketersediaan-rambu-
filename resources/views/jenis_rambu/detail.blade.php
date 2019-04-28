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
                <h2>Detail  Rambu {{$jenis_rambu->nama_jenis}},</h2>
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
                        <div class="table-responsive">
                          <table class="table striped "  id="myTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Rambu</th>
                                <th>Nama Rambu</th>
                                <th>Jenis Rambu</th>

                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($rambu as $r)
                                <tr>
                                <td>{{$no++}}</td>
                                <td>{{$r->kode_rambu}}</td>
                                <td>{{$r->nama_rambu}}</td>
                                <td>{{$r->jenis_rambu->nama_jenis}}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-secondary "> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{route('rambu_edit', ['id' => IDCrypt::Encrypt( $r->id)])}}" class="btn btn-info"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="{{route('jenis_rambu_hapus', ['id' => IDCrypt::Encrypt( $r->id)])}}" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
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
