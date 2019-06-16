<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi_rambu;
class mapController extends Controller
{

    public function index(){

        return view('map.index');
    }

    public function detail($id){
        $lokasi_rambu=lokasi_rambu::findOrFail($id);

        if($lokasi_rambu->status == 1){
        return (view('titik_lokasi.lokasi_ketersediaan_rambu_detail',compact('lokasi_rambu')));
        }else{
        return (view('titik_lokasi.lokasi_kebutuhan_rambu_detail',compact('lokasi_rambu')));   
        }
     }//fungsi detail lokasi ketersediaan rambu

}
