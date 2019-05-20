<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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


//kecamatan
Route::get('/kecamatan','lokasiController@kecamatan_index')->name('kecamatan_index');
Route::post('/kecamatan','lokasiController@kecamatan_add')->name('kecamatan_add');
Route::get('/kecamatan_hapus/{id}','lokasiController@kecamatan_delete')->name('kecamatan_delete');
Route::get('/kecamatan_detail/{id}','lokasiController@kecamatan_detail')->name('kecamatan_detail');

//kelurahan
Route::get('/kelurahan','lokasiController@kelurahan_index')->name('kelurahan_index');
Route::post('/kelurahan','lokasiController@kelurahan_add')->name('kelurahan_add');
Route::get('/kelurahan_edit/{id}','lokasiController@kelurahan_edit')->name('kelurahan_edit');
Route::get('/kelurahan_hapus/{id}','lokasiController@kelurahan_delete')->name('kelurahan_delete');

});




