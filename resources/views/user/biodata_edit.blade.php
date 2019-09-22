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
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <form class="forms-sample" method="post" action="">
                            {{method_field('PUT') }}
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama </label>
                            <input type="text" class="form-control" id="nama" name="nama" value='{{$biodata->nama}}'
                                placeholder="Nama">
                        </div>
                        <div class="form-group row">
                                        <div class="col-md-12"><label for="InputNormal" class="form-control-label">Jenis
                                                Kelamin</label></div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label for="optionsRadios1" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="jk"
                                                        id="radio1" value="Laki-laki" {{ ($biodata->jk == "Laki-laki")? "checked" : "" }} >
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="optionsRadios2" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="jk"
                                                        id="radio2" value="Perempuan" {{ ($biodata->jk == "Perempuan")? "checked" : "" }} >
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                        <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="latitude" class="control-label">Tempat Lahir</label>
                                                <input id="tempat_lahir" type="text"
                                                    class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}"
                                                    name="tempat_lahir"value='{{$biodata->tempat_lahir}}'
                                                    >
                                                {!! $errors->first('tempat_lahir', '<span class="invalid-feedback"
                                                    role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="longitude" class="control-label">Tanggal Lahir</label>
                                                <input id="longitude" type="date"
                                                    class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}"
                                                    name="tanggal_lahir"
                                                    value='{{$biodata->tanggal_lahir}}' >
                                                {!! $errors->first('tanggal_lahir', '<span class="invalid-feedback"
                                                    role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="form-group row">
                                        <div class="col-md-12"><label for="InputNormal" class="form-control-label">Status
                                                Menikah</label></div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label for="optionsRadios1" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status"
                                                        id="radio3" value="1" {{ ($biodata->status == "1")? "checked" : "" }} >
                                                    Belum Menikah
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="optionsRadios2" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status"
                                                        id="radio4" value="2" {{ ($biodata->status == "2")? "checked" : "" }}>
                                                    Sudah Menikah
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="btn btn-primary mr-2" type="submit" name="submit" value="Ubah">
                            {{csrf_field() }}
                            <a class="btn btn-danger" href="{{ route('jenis_rambu_index') }}">Batal</a>
                    </div>
                </div>
            </div>
        </div>
        @endsection
