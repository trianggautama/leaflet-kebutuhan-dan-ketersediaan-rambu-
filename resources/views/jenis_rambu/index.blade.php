@extends('layouts.admin')

@section('title', __('outlet.list'))

@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="mr-md-3 mr-xl-5">
                <h2>Data Jenis Rambu,</h2>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
              <a href="/" class="btn btn-sm btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> tabah data</a>
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
                                <th>Jenis Rambu</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($jenis_rambu as $jr)
                                <tr>
                                <td>{{$no++}}</td>
                                <td>Rambu {{$jr->nama_jenis}}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-secondary "> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{route('jenis_rambu_edit', ['id' => IDCrypt::Encrypt( $jr->id)])}}" class="btn btn-info"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="{{route('jenis_rambu_hapus', ['id' => IDCrypt::Encrypt( $jr->id)])}}" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Jenis</label>
                        <input type="text" class="form-control" id="nama_jenis"  name="nama_jenis" placeholder="Nama jenis rambu">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
              {{csrf_field() }}
            </form>
            </div>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
@endsection
