<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('kebutuhan_rambu', 'lokasiController@kebutuhan_index')->name('kebutuhan_rambu_index');
    Route::get('ketersediaan_rambu', 'lokasiController@ketersediaan_index')->name('ketersediaan_rambu_index');

});
