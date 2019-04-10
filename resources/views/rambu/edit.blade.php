@extends('layouts.admin')

@section('title', __('outlet.list'))

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form class="forms-sample" method="post" action="">
                                 {{method_field('PUT') }}
                                 {{ csrf_field() }}
                                 <div class="form-group">
                                 <input type="text" class="form-control" id="kode_rambu"  name="kode_rambu" value="{{$rambu->kode_rambu}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama_rambu"  name="nama_rambu" value="{{$rambu->nama_rambu}}">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleSelectGender" name="jenis_id">
                                            @foreach ($jenis_rambu as $jr)
                                                <option value="{{$jr->id}}" {{$rambu->jenis_rambu_id == $jr->id ? 'selected' : ''}}>Rambu {{$jr->nama_jenis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <div class="form-group">
                                                    <input type="file" name="gambar" class="file-upload-default">
                                                    <div class="input-group col-xs-12">
                                                      <input type="text" class="form-control file-upload-info" name=""  placeholder="Gambar Rambu">
                                                      <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                      </span>
                                                    </div>
                                                  </div>
                                            <div class="form-group">
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="keterangan" name="keterangan">{{$rambu->keterangan}}</textarea>
                                            </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <input class="btn btn-primary" type="submit" name="submit" value="Ubah">
                              {{csrf_field() }}
                            </form>
                          </div>
                        </div>
                      </div>
        </div>
@endsection
