@extends('layouts.laporan')

@section('title', __('outlet.list'))

@section('content')

<section class="feedback-area section-gap relative" id="head">
				<div class="overlay overlay-bg"></div>
				<div class="container">			
					<div class="row feedback-contents justify-content-center align-items-center">
						<div class="col-lg-6 feedback-left relative d-flex justify-content-center align-items-center">
							<div class="overlay overlay-bg"></div>
						</div>
						<div class="col-lg-6 feedback-right text-center" style="margin-left:5px;">
							<h1 class="text-white">Aplikasi Pemetaan Lokasi Kebutuhan dan Ketersediaan Rambu Lalu-lintas</h1>
							<h4 >Dinas Perhubungan Kota Banjarbaru</h4>
							<br>
							<a class="primary-btn" href="#laporan_masyarakat">Lebih Lanjut</a>
						</div>
					</div>
				</div>	
            </section>
            <br>
            <div class="container" style="padding-right:10%;padding-left:10%;">
                <div class="text-center">
                <h6>FORM LAPORAN</h6>
                <h1>Silahkan Isi Form Laporan Berikut </h1>
                <br>
                </div>
        	<form action="">
                        <input class="form-control" name="nama" placeholder="Masukan Nama Anda" onfocus="this.placeholder = ''" required="" type="text">
                        <br>
                        <input class="form-control" name="no_hp" placeholder="Nomor yang Bisa Dihubungi" onfocus="this.placeholder = ''" required="" type="text">
                        <br>
                        <input class="form-control" type="file" accept="image/*" capture="camera" />
                        <br>
                        <textarea class="form-control" name="alamat" id="" ></textarea>
                        <br>                   
                        
                        </div>                  
                        <div id='map'></div>      
                        <br>
                        <div class="container text-right"  style="padding-right:10%;padding-left:10%;">
                        <input type="submit" class="btn btn-primary">
                        </div>
                        </form>
                        <br>
</div>@endsection
