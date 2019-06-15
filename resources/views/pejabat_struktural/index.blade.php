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
                            <h2>Data Pejabat Struktural,</h2>
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
                            <a href="/" class="btn btn-sm btn-inverse-primary mt-2 mt-xl-0" data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> tabah data</a>
                            <a href="/" class="btn btn-sm btn-inverse-info mt-2 mt-xl-0" data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-printer "></i> Cetak data</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Pejabat</th>
                                        <th>Golongan</th>
                                        <th>Jabatan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($pejabat_struktural as $ps)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$ps->nip}}</td>
                                        <td> {{$ps->nama_pejabat}}</td>
                                        <td> {{$ps->pangkat}}</td>
                                        <td> {{$ps->jabatan}}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-inverse-success " style="padding:6px !important;">
                                                <i class=" mdi mdi-eye "></i></a>
                                            <a href="{{route('kelurahan_edit', ['id' => IDCrypt::Encrypt( $ps->id)])}}"
                                                class="btn btn-inverse-info" style="padding:6px !important;"> <i
                                                    class="mdi mdi-pencil"></i></a>
                                            <button type="button" class="btn btn-inverse-danger"
                                                style="padding:6px !important;"
                                                onclick="Hapus('{{Crypt::encryptString($ps->id)}}','{{$ps->nama_pejabat}}')"><b><i
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
                            <label for="exampleInputUsername1">NIP</label>
                            <input type="text" class="form-control" id="kode_kelurahan" name="nip"
                                placeholder="NIP">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Pejabat</label>
                            <input type="text" class="form-control" id="nama_kelurahan" name="nama_pejabat"
                                placeholder="Nama Pejabat" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Pangkat</label>
                            <input type="text" class="form-control" id="nama_kelurahan" name="pangkat"
                                placeholder="Pangkat" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1"> Jabatan</label>
                            <select class="form-control" id="exampleSelectGender" name="jabatan">
                                <option>-pilih jabatan-</option>
                                <option value="KEPALA DINAS">Kepala Dinas Perhubungan</option>
                                <option value="KASI REKSA">Kasi Rekayasa Lalu-lintas</option>
                            </select>
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


    <script>
        function Hapus(id, nama_pejabat) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'apa anda yakin?',
                text: " Menghapus Pejabat '" + nama_pejabat +
                    "' juga akan menghapus data lokasi yang berelasi",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'hapus data',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons(
                        'Deleted!',
                        "Data Pejabat '" + nama_pejabat + "' Akan di Hapus",
                        'success'
                    );
                    window.location = "/pejabat_struktural_hapus/" + id;
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Dibatalkan',
                        'data batal dihapus',
                        'error'
                    )
                }
            })

        }

    </script>
