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
                <h2>Data Lokasi ketersediaan Rambu,</h2>
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
                          <a href="/lokasi_ketersediaan_tambah" class="btn btn-sm btn-inverse-primary " > <i class=" mdi mdi-plus "></i> tabah data</a>
                          <a href="/" class="btn btn-sm btn-inverse-info " data-toggle="modal" data-target="#exampleModalCenter"> <i class=" mdi mdi-printer "></i> cetak data</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                          <table class="table striped "  id="myTable">
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
                                   <label class="label-danger" for=""> Hilang</label>
                                @endif
                                </td>
                                    <td class="text-center">
                                        <a href="{{route('lokasi_ketersediaan_detail', ['id' => IDCrypt::Encrypt( $lk->id)])}}" class="btn btn-inverse-success " style="padding:6px !important;"> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{route('rambu_edit', ['id' => IDCrypt::Encrypt( $lk->id)])}}" class="btn btn-inverse-primary" style="padding:6px !important;"> <i class="mdi mdi-pencil"></i></a>
                                        <button type="button" class="btn btn-inverse-danger" style="padding:6px !important;"
                                        onclick="Hapus('{{Crypt::encryptString($lk->id)}}','{{$lk->nama_rambu}}')"><b><i class="mdi mdi-delete"></i></b></button>
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

<script>
        function Hapus(id,nama_rambu)
        {
          const swalWithBootstrapButtons = swal.mixin({
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
        })

        swalWithBootstrapButtons({
          title: 'apa anda yakin?',
          text:  " Menghapus Rambu '"+nama_rambu+"' juga akan menghapus data Lokasi yang berelasi",
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'hapus data',
          cancelButtonText: 'batal',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            swalWithBootstrapButtons(
              'Deleted!',
              "Data kelurahan '"+nama_rambu+"' Akan di Hapus",
              'success'
            );
             window.location = "/rambu_hapus/"+id;
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