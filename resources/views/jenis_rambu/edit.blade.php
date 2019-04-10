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
                                    <label for="exampleInputUsername1">Nama Jenis</label>
                                <input type="text"  name="nama_jenis" class="form-control" id="nama_jenis" placeholder="Nama Jenis" value="{{$jenis_rambu->nama_jenis}}">
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
