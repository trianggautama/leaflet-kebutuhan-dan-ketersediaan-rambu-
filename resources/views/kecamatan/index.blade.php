@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    @include('layouts.alert')
                        @include('layouts.errors')
                        <h3>Data Kecamatan</h3>
                        <div class="text-right">
                            <a href="/" class="btn btn-sm btn-primary btn-icon-text" data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> tabah data</a>
                            <a href="/" class="btn btn-sm btn-info btn-icon-text" data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-printer "></i> tabah data</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kecamatan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($kecamatan as $kec)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Kecamatan {{$kec->nama_kecamatan}}</td>
                                        <td class="text-center">
                                            <a href="{{route('kecamatan_detail', ['id' => IDCrypt::Encrypt( $kec->id)])}}" class="btn btn-inverse-success " style="padding:6px !important;">
                                                <i class=" mdi mdi-eye "></i> </a>
                                            <a href="#"
                                                class="btn btn-inverse-primary" style="padding:6px !important;"> <i
                                                    class="mdi mdi-pencil"></i> </a>
                                            <button type="button" class="btn btn-inverse-danger"
                                                style="padding:6px !important;"
                                                onclick="Hapus('{{Crypt::encryptString($kec->id)}}','{{$kec->nama_kecamatan}}')"><b><i
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
                            <label for="exampleInputUsername1">Kode Kecamatan</label>
                            <input type="text" class="form-control" id="kode_kecamatan" name="kode_kecamatan"
                                placeholder="Kode Kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Kecamatan</label>
                            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                                placeholder="Nama Kecamatan">
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
        function Hapus(id, nama_kecamatan) {
            Swal.fire({
                title: 'apa anda yakin?',
                text: " Menghapus Kecamatan '" + nama_kecamatan +
                    "' juga akan menghapus data kelurahan yang berelasi",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'hapus data',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location = "/kecamatan_hapus/" + id;
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
