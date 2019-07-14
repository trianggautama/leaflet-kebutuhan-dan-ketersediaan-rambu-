@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                        <h2>Peta Lokasi kebutuhan Rambu,</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="/home" class="btn btn-sm btn-danger mt-2 mt-xl-0" style="margin-right:5px"><i
                                class="mdi mdi-close "></i> Kembali</a>
                        <a href="{{Route('lokasi_kebutuhan_tambah')}}" class="btn btn-sm btn-primary mt-2 mt-xl-0"><i
                                class="mdi mdi-map-marker-plus "></i> Tambah Lokasi</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="mapid" style="width: 100%; height: 650px"></div>
        @push('scripts')
        <script>
            var mymap = L.map('mapid').setView([{{config('leaflet.map_center_latitude')}}, {{config('leaflet.map_center_longitude')}}], {{ config('leaflet.zoom_level')}});
            L.tileLayer(
                'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox.streets'
                }).addTo(mymap);
                
            axios.get('{{ route('api.kebutuhan_rambu_index') }}')
            .then(function (response) {
              console.log(response.data);
             L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng);
            }
             })
            .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
            }).addTo(mymap);
             })
             .catch(function (error) {
             console.log(error);
              });

         @can('create', new App\lokasi_rambu)
         var theMarker;
         map.on('click', function(e) {
         let latitude = e.latlng.lat.toString().substring(0, 15);
         let longitude = e.latlng.lng.toString().substring(0, 15);
         if (theMarker != undefined) {
            map.removeLayer(theMarker);
         };
         var popupContent = "Your location : " + latitude + ", " + longitude + ".";
         popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';
         theMarker = L.marker([latitude, longitude]).addTo(mymap);
         theMarker.bindPopup(popupContent)
        .openPopup();
         });
        @endcan

        </script>
        @endpush
    </div>
    @endsection
