@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('layouts.errors')
                        <h4 class="card-title">Tambah Lokasi Ketersediaan Rambu</h4>
                        <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                            {{method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sel1">Rambu yang diperlukan:</label>
                                        <select multiple class="form-control" id="rambu" name="rambu_id">
                                            @foreach( $rambu as $r)
                                            <option value="{{$r->id}}"
                                                {{$lokasi_rambu->rambu_id == $r->id ? 'selected' : ''}}>
                                                {{$r->nama_rambu}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">kelurahan</label>
                                        <select multiple class="form-control" id="kelurahan" name="kelurahan_id">
                                            @foreach( $kelurahan as $k)
                                            <option value="{{$k->id}}"
                                                {{$lokasi_rambu->kelurahan_id == $k->id ? 'selected' : ''}}>
                                                {{$k->nama_kelurahan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Alamat</label>
                                        <textarea class="form-control" id="exampleTextarea1" name="alamat"
                                            rows="4">{{$lokasi_rambu->alamat}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tahun Pengadaan</label>
                                        <input type="text" class="form-control" name="apbn"
                                            value="{{$lokasi_rambu->ketersediaan_rambu->apbn}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status Prioritas</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"
                                            name="kondisi">
                                            <option value="1"
                                                {{$lokasi_rambu->ketersediaan_rambu->kondisi == "1" ? 'selected' : ''}}>
                                                Baik</option>
                                            <option value="2"
                                                {{$lokasi_rambu->ketersediaan_rambu->kondisi == "2" ? 'selected' : ''}}>
                                                Rusak/kubas</option>
                                            <option value="3"
                                                {{$lokasi_rambu->ketersediaan_rambu->kondisi == "3" ? 'selected' : ''}}>
                                                Hilang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="gambar" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" name="gambar"
                                                placeholder="Gambar Lokasi">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <small> isi jika ingin mengubah gambar</small>

                                </div>
                                <br>
                                <div class="text-right">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                    {{csrf_field() }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            var map = L.map('map');

            L.tileLayer(
                'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Klik/tap pada peta untuk menambah koordinat',
                    id: 'mapbox.streets',
                    maxZoom: 18
                }).addTo(map);

            function onLocationFound(e) {
                var radius = e.accuracy;

                L.circle(e.latlng, radius).addTo(map);
            }

            function onLocationError(e) {
                alert(e.message);
            }
            map.on('click', function (e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);
                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
                updateMarker(latitude, longitude);
            });
            var updateMarkerByInputs = function () {
                return updateMarker($('#latitude').val(), $('#longitude').val());
            }
            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);

            map.locate({
                setView: true,
                maxZoom: 16
            });

        </script>
        @endpush
    </div>
    @endsection
