@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">Data Lokasi ketersediaan Rambu</h3>
                        <div class="text-right">
                            <a href="/lokasi_ketersediaan_tambah" class="btn btn-sm btn-primary "> <i
                                    class=" mdi mdi-plus "></i> tabah data</a>
                            <a href="{{route('lokasi_ketersediaan_keseluruhan_cetak')}}"
                                class="btn btn-sm btn-info "> <i class=" mdi mdi-printer "></i> cetak data</a>
                            <a href="/" class="btn btn-sm btn-info " data-toggle="modal"
                                data-target="#exampleModalCenter"> <i class="  mdi mdi-printer "></i> Cetak Filter Data</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>rambu yang terpasang</th>
                                        <th>alamat</th>
                                        <th>tahun pengadaan</th>
                                        <th>kondisi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($lokasi_ketersediaan as $lk)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$lk->rambu->nama_rambu}}</td>
                                        <td>{{$lk->alamat}}</td>
                                        <td>{{$lk->ketersediaan_rambu->apbn}}</td>
                                        <td>
                                            @if ($lk->ketersediaan_rambu->kondisi == 1)
                                            <span class="badge badge-success">Baik</span>
                                            @elseif ($lk->ketersediaan_rambu->kondisi == 2)
                                            <label class="badge badge-warning" for=""> Perlu Rehab</label>
                                            @else
                                            <label class="badge badge-danger" for=""> Hilang</label>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('lokasi_ketersediaan_detail', ['id' => IDCrypt::Encrypt( $lk->id)])}}"
                                                class="btn btn-inverse-success " style="padding:6px !important;"> <i
                                                    class=" mdi mdi-eye "></i></a>
                                            <a href="{{route('lokasi_ketersediaan_edit', ['id' => IDCrypt::Encrypt( $lk->id)])}}"
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
                    <label for="exampleFormControlSelect1">Tahun Penpgadaan</label>
                    <input  class="form-control form-control-lg"type="number" name="apbn" placeholder="YYYY" min="2017" max="2030">
                        <label for="exampleFormControlSelect1">Kondisi Rambu</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"
                            name="kondisi">
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="1">Baik</option>
                            <option value="2">Rusak/kubas</option>
                            <option value="3">Hilang</option>
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

            Swal.fire({
                title: 'apa anda yakin?',
                text: " Menghapus Kecamatan '" + alamat +
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
                    window.location = "/lokasi_ketersediaan_hapus/" + id;
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
    <script>
  document.querySelector("input[type=number]")
  .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
</script>
