@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        @include('layouts.errors')
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Data User</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($User as $u)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$u->nip}}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{$u->username}}</td>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <label for="exampleInputUsername1">Kode kelurahan</label>
                            <input type="text" class="form-control" id="kode_kelurahan" name="kode_kelurahan"
                                placeholder="Kode Kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama kelurahan</label>
                            <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan"
                                placeholder="Nama Kecamatan" autocomplete="off">
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
  
