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
              <img src="/images/kebutuhan_rambu/{{$lokasi_rambu->kebutuhan_rambu->gambar}}" width="300"alt="">
              </div>
              <a href="" class="btn btn-inverse-info"><i class="mdi mdi-printer"></i> Cetak Data Lokasi</a>
            </div>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">keterangan lokasi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Peta</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="card">
                            <div class="card-body">
                            <br>
                              <div class="row">
                                  <div class="col-md-3 col-xs-3">
                                      <h5>Kebutuhan Rambu :</h5>
                                      <hr>
                                      <h5>Alamat :</h5>
                                      <hr>
                                      <h5>Kelurahan :</h5>
                                      <hr>
                                      <h5>prioritas :</h5>
                                  </div>
                                  <div class="col-md-9 col-xs-9">
                                      <h5>  {{$lokasi_rambu->rambu->nama_rambu}}</h5>
                                      <hr>
                                      <h5>  {{$lokasi_rambu->alamat}}</h5>
                                      <hr>
                                      <h5>  {{$lokasi_rambu->kelurahan->nama_kelurahan}}</h5>
                                      <hr>
                                      <h5>  {{$lokasi_rambu->kebutuhan_rambu->prioritas}}</h5>
                                  </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">

                        <div id="mapid" style="width: 97%; height: 450px"></div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    @push('scripts')
    <script>
        var mymap = L.map('mapid').setView([{{ $lokasi_rambu->latitude }}, {{ $lokasi_rambu->longitude }}], {{ config('leaflet.detail_zoom_level') }});
             L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              maxZoom: 18,
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              id: 'mapbox.streets'
          }).addTo(mymap);
          L.marker([{{ $lokasi_rambu->latitude }}, {{ $lokasi_rambu->longitude }}]).addTo(mymap)
        .bindPopup('{!! $lokasi_rambu->map_popup_content !!}');
        map.locate({setView: true, maxZoom: 16});
    </script>
  @endpush

@endsection


