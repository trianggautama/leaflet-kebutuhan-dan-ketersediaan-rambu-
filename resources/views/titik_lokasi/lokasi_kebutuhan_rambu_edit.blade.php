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
                        <h4 class="card-title">Tambah Lokasi Kebutuhan Rambu</h4>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Alamat</label>
                                        <textarea class="form-control" id="exampleTextarea1" name="alamat"
                                            rows="4">{{$lokasi_rambu->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status Prioritas</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"
                                            name="prioritas">
                                            <option value="biasa"
                                                {{$lokasi_rambu->kebutuhan_rambu->prioritas == 'biasa' ? 'selected' : ''}}>
                                                Biasa</option>
                                            <option value="mendesak"
                                                {{$lokasi_rambu->kebutuhan_rambu->prioritas == 'mendesak' ? 'selected' : ''}}>
                                                Mendesak</option>
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
    </div>
    @endsection
