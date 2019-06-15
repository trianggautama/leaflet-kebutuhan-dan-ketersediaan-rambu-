<?php

namespace App\Http\Controllers;
use IDCrypt;
use App\pejabat_struktural;
use Illuminate\Http\Request;

class pejabatController extends Controller
{
    
    public function pejabat_struktural_index(){
        
        $pejabat_struktural = pejabat_struktural::all();

        return view('pejabat_struktural.index',compact('pejabat_struktural'));

    }

    public function pejabat_struktural_tambah(Request $request){

        //  dd($request);
          $this->validate(request(),[
              'nip'=>'required|unique:pejabat_strukturals',
              'nama_pejabat'=>'required',
              'pangkat'=>'required',
              'jabatan'=>'required',

            ]);
            $pejabat_struktural = new pejabat_struktural;
            $pejabat_struktural->nip= $request->nip;
            $pejabat_struktural->nama_pejabat= $request->nama_pejabat;
            $pejabat_struktural->pangkat= $request->pangkat;
            $pejabat_struktural->jabatan= $request->jabatan;

            $pejabat_struktural->save();
  
              return redirect(route('pejabat_struktural_index'))->with('success', 'Data Jenis rambu '.$request->nama_pejabat.' Berhasil di Simpan');
      }

      public function pejabat_struktural_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $pejabat_struktural=pejabat_struktural::findOrFail($id);
        $pejabat_struktural->delete();
        return redirect(route('pejabat_struktural_index'));
    } //menghapus  data jenis rambu

}
