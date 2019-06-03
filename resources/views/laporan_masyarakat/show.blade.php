@extends('layouts.admin')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-4 grid-margin ">
            <div class="card">
              <div class="card-body text-center ">
                <h4 class="card-title">Foto Lokasi</h4>
              <img src="/images/laporan_masyarakat/{{$laporan_masyarakat->gambar}}" width="100% "alt="">
              </div>
              <a href="" class="btn btn-inverse-info"><i class="mdi mdi-printer"></i> Cetak Laporan Masyarakat</a>
            </div>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">keterangan lokasi</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="card">
                            <div class="card-body">
                            <br>
                              <div class="row">
                                  <div class="col-md-3 col-xs-3">
                                      <h5>Nama Pengirim :</h5>
                                      <hr>
                                      <h5>No Telp :</h5>
                                      <hr>
                                      <h5>keterangan :</h5>
                                      <hr>
                                      <h5>longitude :</h5>
                                      <hr>
                                      <h5>latitude  :</h5>
                                  </div>
                                  <div class="col-md-9 col-xs-9">
                                      <h5>  {{$laporan_masyarakat->nama}}</h5>
                                      <hr>
                                      <h5>  {{$laporan_masyarakat->no_hp}}</h5>
                                      <hr>
                                      <h5>  {{$laporan_masyarakat->keterangan}}</h5>
                                      <hr>
                                      <h5>  {{$laporan_masyarakat->longitude}}</h5>
                                      <hr>
                                      <h5>  {{$laporan_masyarakat->latitude}}</h5>
                                  </div>
                              </div>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div  class="card-body" id="map" style="width: 100%; height: 450px"></div>

    </div>
@push('scripts')

<script> var map = L.map('map').setView([{{ $laporan_masyarakat->latitude }}, {{ $laporan_masyarakat->longitude }}], {{ config('leaflet.detail_zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([{{ $laporan_masyarakat->latitude }}, {{ $laporan_masyarakat->longitude }}]).addTo(map)
        .bindPopup('{!! $laporan_masyarakat->map_popup_content !!}');
        </script>
      @endpush
@endsection
