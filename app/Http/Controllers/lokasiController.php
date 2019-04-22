<?php

namespace App\Http\Controllers;
use App\kecamatan;
use IDCrypt;
use Illuminate\Http\Request;

class lokasiController extends Controller
{
    //funsi kecamatan
    public function kecamatan_index(){

        $kecamatan = kecamatan::all();

        return (view('kecamatan.index',compact('kecamatan')));
    }

    public function kecamatan_add(Request $request){

        //  dd($request);
          $this->validate(request(),[
              'kode_kecamatan'=>'required|unique:kecamatan',
              'nama_kecamatan'=>'required'
            ]);
            $kecamatan = new kecamatan;
            $kecamatan->kode_kecamatan= $request->kode_kecamatan;
            $kecamatan->nama_kecamatan= $request->nama_kecamatan;
            $kecamatan->save();
  
              return redirect(route('kecamatan_index'))->with('success', 'Data Jenis rambu '.$request->nama_kecamatan.' Berhasil di Simpan');
      }
      public function kecamatan_delete($id){
            $id = IDCrypt::Decrypt($id);
            $kecamatan=kecamatan::findOrFail($id);
            $kecamatan->delete();
            return redirect(route('kecamatan_index'))->with('success', 'Data  Berhasil di hapus');
    } //menghapus  data kecamatan


}
