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
                            <h2>Beranda,</h2>
                            <p class="mb-md-0">Selamat datang di beranda admin</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block "
                            title="profil">
                            <i class="mdi mdi-account-circle  text-muted"></i>
                        </button>
                        <a href="/" class="btn btn-sm btn-inverse-primary mr-3 mt-xl-0"> <i class="mdi mdi-home"></i>
                            Halaman Depan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Peta Lokasi</h4>
                        <div class="media">
                            <img src="/images/undraw_world_9iqb.png" width="200" alt="">
                            <div class="media-body">
                                <p class="card-text">Menampilkan data dengan citra/peta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lokasi Kebutuhan dan ketersediaan Rambu</h4>
                        <div class="media">
                            <img src="/images/undraw_map_light_6ttm.png" width="200" alt="">
                            <div class="media-body">
                                <p class="card-text">Mengelola data kebutuhan dan ketersediaan rambu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Permintaan Masyarakat</h4>
                        <div class="media">
                            <img src="/images/undraw_opened_gi4n.png" width="200" alt="">
                            <div class="media-body">
                                <p class="card-text">Melibatkan Masyarakat dengan fitur pelapoyran masyarakatt</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengelolaan User</h4>
                        <div class="media">
                            <img src="/images/undraw_add_user_ipe3.png" width="200" alt="">
                            <div class="media-body">
                                <p class="card-text">Pengelolaan User/Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    @endsection
