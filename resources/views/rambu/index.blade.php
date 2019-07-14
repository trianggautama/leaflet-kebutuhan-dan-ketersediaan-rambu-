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
                        <h3>Data Rambu</h3>
                        <div class="text-right">
                            <a href="/" class="btn btn-sm btn-primary " data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> tabah data</a>
                            <a href="{{route('rambu_keseluruhan_cetak')}}" class="btn btn-sm btn-info "> <i
                                    class=" mdi mdi-printer "></i> cetak data</a>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
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
                                            <a href="{{route('rambu_detail', ['id' => IDCrypt::Encrypt( $r->id)])}}"
                                                class="btn btn-inverse-success " style="padding:6px !important;"> <i
                                                    class=" mdi mdi-eye "></i></a>
                                            <a href="{{route('rambu_edit', ['id' => IDCrypt::Encrypt( $r->id)])}}"
                                                class="btn btn-inverse-primary" style="padding:6px !important;"> <i
                                                    class="mdi mdi-pencil"></i></a>
                                            <button type="button" class="btn btn-inverse-danger"
                                                style="padding:6px !important;"
                                                onclick="Hapus('{{Crypt::encryptString($r->id)}}','{{$r->nama_rambu}}')"><b><i
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
                            <input type="text" class="form-control" id="kode_rambu" name="kode_rambu"
                                placeholder="Kode rambu">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_rambu" name="nama_rambu"
                                placeholder="Nama rambu">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleSelectGender" name="jenis_id">
                                <option>-pilih jenis rambu-</option>
                                @foreach ($jenis_rambu as $jr)
                                <option value="{{$jr->id}}">Rambu {{$jr->nama_jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="gambar" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" name=""
                                    placeholder="Gambar Rambu">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="keterangan"
                                name="keterangan"></textarea>
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
        function Hapus(id, nama_rambu) {
            Swal.fire({
                title: 'apa anda yakin?',
                text: " Menghapus Rambu '" + nama_rambu +
                    "' juga akan menghapus data lokasi rambu yang berelasi",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'hapus data',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location = "/rambu_hapus/" + id;
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
