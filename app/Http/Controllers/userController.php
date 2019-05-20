<?php

namespace App\Http\Controllers;
use App\laporan_masyarakat;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function kirim_laporan( Request $request){
        $this->validate(request(),[
            'nama'=>'required',
            'no_hp'=>'required',
            'keterangan'=>'required',
            'gambar'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
        ]);
        $laporan_masyarakat = new laporan_masyarakat;
        $FotoExt  = $request->gambar->getClientOriginalExtension();
        $FotoName = $request->nama.' - '.$request->no_hp;
        $gambar     = $FotoName.'.'.$FotoExt;
        $request->gambar->move('images/laporan_masyarakat', $gambar);

        $laporan_masyarakat->nama= $request->nama;
        $laporan_masyarakat->no_hp= $request->no_hp;
        $laporan_masyarakat->keterangan= $request->keterangan;
        $laporan_masyarakat->gambar            = $gambar;
        $laporan_masyarakat->longitude= $request->longitude;
        $laporan_masyarakat->latitude= $request->latitude;
        $laporan_masyarakat->save();
          return redirect(route('/laporan_masyarakat'))->with('success', 'Data Berhasil di Tambahkan');
    }

}
