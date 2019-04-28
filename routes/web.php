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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map','mapController@index')->name('map');

//route  jenis rambu
Route::get('/jenis_rambu','rambuController@jenis_rambu_index')->name('jenis_rambu_index');
Route::post('/jenis_rambu','rambuController@jenis_rambu_add')->name('jenis_rambu_add');
Route::get('/jenis_rambu_edit/{id}','rambuController@jenis_rambu_edit')->name('jenis_rambu_edit');
Route::put('/jenis_rambu_edit/{id}','rambuController@jenis_rambu_update')->name('jenis_rambu_update');
Route::get('/jenis_rambu_hapus/{id}','rambuController@jenis_rambu_hapus')->name('jenis_rambu_hapus');
//Route Rambu
Route::get('/rambu','rambuController@rambu_index')->name('rambu_index');
Route::post('/rambu','rambuController@rambu_add')->name('rambu_add');
Route::get('/rambu_edit/{id}','rambuController@rambu_edit')->name('rambu_edit');
Route::put('/rambu_edit/{id}','rambuController@rambu_update')->name('rambu_update');


//kecamatan
Route::get('/kecamatan','lokasiController@kecamatan_index')->name('kecamatan_index');
Route::post('/kecamatan','lokasiController@kecamatan_add')->name('kecamatan_add');
Route::get('/kecamatan_hapus/{id}','lokasiController@kecamatan_delete')->name('kecamatan_delete');

//kelurahan
Route::get('/kelurahan','lokasiController@kelurahan_index')->name('kelurahan_index');
Route::post('/kelurahan','lokasiController@kelurahan_add')->name('kelurahan_add');
Route::get('/kelurahan_edit/{id}','lokasiController@kelurahan_edit')->name('kelurahan_edit');
Route::get('/kelurahan_hapus/{id}','lokasiController@kelurahan_delete')->name('kelurahan_delete');







