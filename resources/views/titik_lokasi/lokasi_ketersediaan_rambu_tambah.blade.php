@extends('layouts.admin')
@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Tambah Lokasi Kebutuhan Rambu</h4>
                            <form class="forms-sample" method="post" action="">
                                 {{method_field('PUT') }}
                                 {{ csrf_field() }}
                                <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="sel1">Rambu yang diperlukan:</label>
                                     <select multiple class="form-control" id="rambu" name="rambu_id">
                                      @foreach( $rambu as $r)
                                     <option value="{{$r->id}}">{{$r->nama_rambu}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                     <label for="sel1">kelurahan</label>
                                     <select multiple class="form-control" id="kelurahan" name="kelurahan_id">
                                        @foreach( $kelurahan as $k)
                                     <option value="{{$k->id}}">{{$k->nama_kelurahan}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                   <label for="exampleTextarea1">Alamat</label>
                                   <textarea class="form-control" id="exampleTextarea1" name="alamat" rows="4"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status Prioritas</label>
                                    <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="prioritas">
                                      <option>Biasa</option>
                                      <option>Mendesak</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="file" name="gambar" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" name="gambar"  placeholder="Gambar Lokasi">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                      </span>
                                    </div>
                                  </div>
                                  <input type="hidden" name="status" value="1">
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="latitude" class="control-label">Latitude</label>
                                          <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
                                          {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                        </div>
                                      </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="longitude" class="control-label">Longitude</label>
                                    <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
                                     {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                 </div>
                               </div>
                               <div id="map" style="width: 97%; height: 450px"></div>

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

<script>
	var map = L.map('map');

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Klik/tap pada peta untuk menambah koordinat',
		id: 'mapbox.streets',
		maxZoom: 18

	}).addTo(map);

	function onLocationFound(e) {
		var radius = e.accuracy ;

		L.circle(e.latlng, radius).addTo(map);
	}

	function onLocationError(e) {
		alert(e.message);
	}
  map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });
    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
	map.on('locationfound', onLocationFound);
	map.on('locationerror', onLocationError);

	map.locate({setView: true, maxZoom: 16});
</script>

      </script>
      @endpush
    </div>
@endsection
