@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Data Lokasi kebutuhan Rambu,</h2>
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
                            <a href="/lokasi_kebutuhan_tambah" class="btn btn-sm btn-primary "> <i
                                    class=" mdi mdi-plus "></i> tabah data</a>
                            <a href="/lokasi_kebutuhan_keseluruhan_cetak" class="btn btn-sm btn-info "> <i
                                class=" mdi mdi-printer "></i> cetak semua data data</a>
                            <a href="/" class="btn btn-sm btn-info " data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class="  mdi mdi-printer "></i> Cetak Filter Data</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>rambu yang diperlukan</th>
                                        <th>alamat</th>
                                        <th class="text-center">tanggal survey</th>
                                        <th class="text-center">status prioritas</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($lokasi_rambu as $lk)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$lk->rambu->nama_rambu}}</td>
                                        <td>{{$lk->alamat}}</td>
                                        <td class="text-center">{{$lk->created_at}}</td>
                                        <td class="text-center">{{$lk->kebutuhan_rambu->prioritas}}</td>
                                        <td class="text-center">
                                            <a href="{{route('lokasi_kebutuhan_detail', ['id' => IDCrypt::Encrypt( $lk->id)])}}"
                                                class="btn btn-inverse-success " style="padding:6px !important;"> <i
                                                    class=" mdi mdi-eye "></i></a>
                                            <a href="{{route('lokasi_kebutuhan_edit', ['id' => IDCrypt::Encrypt( $lk->id)])}}"
                                                class="btn btn-inverse-primary" style="padding:6px !important;"> <i
                                                    class="mdi mdi-pencil"></i></a>
                                            <button type="button" class="btn btn-inverse-danger"
                                                style="padding:6px !important;"
                                                onclick="Hapus('{{Crypt::encryptString($lk->id)}}','{{$lk->alamat}}')"><b><i
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
                    <form class="forms-sample" method="post" action="" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Prioritas</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"
                            name="prioritas">
                            <option value="biasa">Biasa</option>
                            <option value="mendesak">Mendesak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <input class="btn btn-primary" type="submit" name="submit" value="Cetak Data">
                    {{csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @endsection



    <script>
        function Hapus(id, alamat) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-inverse-primary',
                cancelButtonClass: 'btn btn-inverse-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'apa anda yakin?',
                text: " Menghapus data kebutuhan rambu di'" + alamat + "'",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'hapus data',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons(
                        'Deleted!',
                        "Data  Akan di Hapus",
                        'success'
                    );
                    window.location = "/lokasi_kebutuhan_hapus/" + id;
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
