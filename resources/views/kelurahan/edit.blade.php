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
                                <label for="exampleInputUsername1">Kode Kelurahan</label>
                                <input type="text" name="kode_kelurahan" class="form-control" id="nama_jenis"
                                    placeholder="Nama Jenis" value="{{$kelurahan->kode_kelurahan}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control" id="nama_jenis"
                                    placeholder="Nama Jenis" value="{{$kelurahan->nama_kelurahan}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1"> Kecamatan</label>
                                <select class="form-control" id="exampleSelectGender" name="kecamatan_id">
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id}}"
                                        {{$kelurahan->kecamatan_id == $kec->id ? 'selected' : ''}}>kecamatan
                                        {{$kec->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="btn btn-primary mr-2" type="submit" name="submit" value="Ubah">
                            {{csrf_field() }}
                            <a class="btn btn-danger" href="{{ route('jenis_rambu_index') }}">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
