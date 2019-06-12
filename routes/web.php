<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/laporan_masyarakat', function () {
    return view('laporan_masyarakat');
});
Route::post('/laporan_masyarakat','userController@kirim_laporan');
Auth::routes();

Route::group(['middleware'=> 'auth'],function(){

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map','mapController@index')->name('map');

//route  jenis rambu
Route::get('/jenis_rambu','rambuController@jenis_rambu_index')->name('jenis_rambu_index');
Route::post('/jenis_rambu','rambuController@jenis_rambu_add')->name('jenis_rambu_add');
Route::get('/jenis_rambu_edit/{id}','rambuController@jenis_rambu_edit')->name('jenis_rambu_edit');
Route::get('/jenis_rambu_detail/{id}','rambuController@jenis_rambu_detail')->name('jenis_rambu_detail');
Route::put('/jenis_rambu_edit/{id}','rambuController@jenis_rambu_update')->name('jenis_rambu_update');
Route::get('/jenis_rambu_hapus/{id}','rambuController@jenis_rambu_hapus')->name('jenis_rambu_hapus');

//Route Rambu
Route::get('/rambu','rambuController@rambu_index')->name('rambu_index');
Route::post('/rambu','rambuController@rambu_add')->name('rambu_add');
Route::get('/rambu_detail/{id}','rambuController@rambu_detail')->name('rambu_detail');
Route::get('/rambu_edit/{id}','rambuController@rambu_edit')->name('rambu_edit');
Route::put('/rambu_edit/{id}','rambuController@rambu_update')->name('rambu_update');
Route::get('/rambu_hapus/{id}','rambuController@rambu_hapus')->name('rambu_hapus');
Route::get('/rambu_keseluruhan_cetak','rambuController@rambu_keseluruhan_cetak')->name('rambu_keseluruhan_cetak');
Route::get('/rambu_detail_cetak/{id}','rambuController@rambu_detail_cetak')->name('rambu_detail_cetak');



//kecamatan
Route::get('/kecamatan','lokasiController@kecamatan_index')->name('kecamatan_index');
Route::post('/kecamatan','lokasiController@kecamatan_add')->name('kecamatan_add');
Route::get('/kecamatan_hapus/{id}','lokasiController@kecamatan_delete')->name('kecamatan_delete');
Route::get('/kecamatan_detail/{id}','lokasiController@kecamatan_detail')->name('kecamatan_detail');

//kelurahan
Route::get('/kelurahan','lokasiController@kelurahan_index')->name('kelurahan_index');
Route::post('/kelurahan','lokasiController@kelurahan_add')->name('kelurahan_add');
Route::get('/kelurahan_edit/{id}','lokasiController@kelurahan_edit')->name('kelurahan_edit');
Route::put('/kelurahan_edit/{id}','lokasiController@kelurahan_update')->name('kelurahan_update');
Route::get('/kelurahan_hapus/{id}','lokasiController@kelurahan_delete')->name('kelurahan_delete');

//lokasi kebutuhan rambu
Route::get('/lokasi_kebutuhan','lokasiController@lokasi_kebutuhan_index')->name('lokasi_kebutuhan_index');
Route::get('/lokasi_kebutuhan_tambah','lokasiController@lokasi_kebutuhan_tambah')->name('lokasi_kebutuhan_tambah');
Route::post('/lokasi_kebutuhan_tambah','lokasiController@lokasi_kebutuhan_store')->name('lokasi_kebutuhan_store');
Route::get('/lokasi_kebutuhan_detail/{id}','lokasiController@lokasi_kebutuhan_detail')->name('lokasi_kebutuhan_detail');
Route::get('/lokasi_kebutuhan_edit/{id}','lokasiController@lokasi_kebutuhan_edit')->name('lokasi_kebutuhan_edit');
Route::put('/lokasi_kebutuhan_edit/{id}','lokasiController@lokasi_kebutuhan_update')->name('lokasi_kebutuhan_update');
Route::get('/lokasi_kebutuhan_hapus/{id}','lokasiController@lokasi_kebutuhan_hapus')->name('lokasi_kebutuhan_hapus');
Route::get('/lokasi_kebutuhan_keseluruhan_cetak','lokasiController@lokasi_kebutuhan_keseluruhan_cetak')->name('lokasi_kebutuhan_keseluruhan_cetak');


// lokasi ketersediaan rambu
Route::get('/lokasi_ketersediaan','lokasiController@lokasi_ketersediaan_index')->name('lokasi_ketersediaan_index');
Route::get('/lokasi_ketersediaan_tambah','lokasiController@lokasi_ketersediaan_tambah')->name('lokasi_ketersediaan_tambah');
Route::post('/lokasi_ketersediaan_tambah','lokasiController@lokasi_ketersediaan_store')->name('lokasi_ketersediaan_store');
Route::get('/lokasi_ketersediaan_detail/{id}','lokasiController@lokasi_ketersediaan_detail')->name('lokasi_ketersediaan_detail');
Route::get('/lokasi_ketersediaan_edit/{id}','lokasiController@lokasi_ketersediaan_edit')->name('lokasi_ketersediaan_edit');
Route::put('/lokasi_ketersediaan_edit/{id}','lokasiController@lokasi_ketersediaan_update')->name('lokasi_ketersediaan_update');
Route::get('/lokasi_ketersediaan_hapus/{id}','lokasiController@lokasi_ketersediaan_hapus')->name('lokasi_ketersediaan_hapus');
Route::get('/lokasi_ketersediaan_keseluruhan_cetak','lokasiController@lokasi_ketersediaan_keseluruhan_cetak')->name('lokasi_ketersediaan_keseluruhan_cetak');


// data laporan Masyarakat
Route::get('/laporan_masyarakat_data','userController@laporan_masyarakat_data')->name('laporan_masyarakat_data');
Route::get('/laporan_masyarakat_show/{id}','userController@laporan_masyarakat_show')->name('laporan_masyarakat_show');

});




