<?php

namespace App\Http\Controllers;
use App\laporan_masyarakat;
Use File;
use IDCrypt;
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
          return redirect('laporan_masyarakat')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function laporan_masyarakat_data(){
        $laporan_masyarakat = laporan_masyarakat::all();
        return view('laporan_masyarakat.index',compact('laporan_masyarakat'));
    }


    public function laporan_masyarakat_show($id){
        $id = IDCrypt::Decrypt($id);
        $laporan_masyarakat = laporan_masyarakat::findOrFail($id);
        $laporan_masyarakat->status = 1;
        $laporan_masyarakat->save();
        return view('laporan_masyarakat.show',compact('laporan_masyarakat'));
       }//fungsi menampilkan isi laporan masyarakat

       public function laporan_masyarakat_hapus($id){
        //dd('tes');
        $id = IDCrypt::Decrypt($id);
        $laporan_masyarakat=laporan_masyarakat::findOrFail($id);
        File::delete('images/laporan_masyarakat/'.$laporan_masyarakat->gambar);
       // $rambu->lokasi_rambu()->delete();
        $laporan_masyarakat->delete();
        return redirect('laporan_masyarakat_data');
    }//fungsi menampilkan isi laporan masyarakat


}
