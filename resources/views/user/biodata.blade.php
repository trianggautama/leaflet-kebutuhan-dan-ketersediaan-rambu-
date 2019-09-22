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
                        <div class="text-right">
                            <a href="/" class="btn btn-sm btn-primary mt-2 mt-xl-0" data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> tabah data</a>
                                <a href="/biodata_cetak" class="btn btn-sm btn-info "> <i
                                class=" mdi mdi-printer "></i> cetak semua data data</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Jenis kelamin</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($biodata as $u)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$u->nama}}</td>
                                        <td>{{$u->tempat_lahir}}{{$u->tanggal_lahir}}</td>
                                        <td>{{$u->jk}}</td>
                                        <td>@if($u->status ==1)
                                            belum Menikah
                                            @else
                                            sudah Menikah
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('biodata_edit', ['id' => IDCrypt::Encrypt( $u->id)])}}"
                                                class="btn btn-inverse-info" style="padding:6px !important;"> <i
                                                    class="mdi mdi-pencil"></i></a>
                                            <button type="button" class="btn btn-inverse-danger"
                                                style="padding:6px !important;"
                                                onclick="Hapus('{{Crypt::encryptString($u->id)}}','{{$u->nama}}')"><b><i
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
                            <label for="exampleInputUsername1">Nama </label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama">
                        </div>
                        <div class="form-group row">
                                        <div class="col-md-12"><label for="InputNormal" class="form-control-label">Jenis
                                                Kelamin</label></div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label for="optionsRadios1" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="jk"
                                                        id="radio1" value="Laki-laki" >
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="optionsRadios2" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="jk"
                                                        id="radio2" value="Perempuan" >
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                        <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="latitude" class="control-label">Tempat Lahir</label>
                                                <input id="tempat_lahir" type="text"
                                                    class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}"
                                                    name="tempat_lahir" value="{{ old('tempat_lahir', request('tempat_lahir')) }}"
                                                    >
                                                {!! $errors->first('tempat_lahir', '<span class="invalid-feedback"
                                                    role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="longitude" class="control-label">Tanggal Lahir</label>
                                                <input id="longitude" type="date"
                                                    class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}"
                                                    name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', request('tanggal_lahir')) }}" >
                                                {!! $errors->first('tanggal_lahir', '<span class="invalid-feedback"
                                                    role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="form-group row">
                                        <div class="col-md-12"><label for="InputNormal" class="form-control-label">Status
                                                Menikah</label></div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label for="optionsRadios1" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status"
                                                        id="radio3" value="1" >
                                                    Belum Menikah
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="optionsRadios2" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status"
                                                        id="radio4" value="2" >
                                                    Sudah Menikah
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                        {{csrf_field() }}
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @endsection
  
    <script>
        function Hapus(id, nama) {
            Swal.fire({
                title: 'apa anda yakin?',
                text: " Menghapus biodata '" + nama +
                    "' ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'hapus data',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location = "/biodata_hapus/" + id;
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                   Swal.fire(
                        'Dibatalkan',
                        'data batal dihapus',
                        'error'
                    )
                }
            })

        }

    </script>
