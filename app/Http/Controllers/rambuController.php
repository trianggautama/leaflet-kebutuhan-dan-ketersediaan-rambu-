<?php

namespace App\Http\Controllers;
use App\jenis_rambu;
use App\rambu;
use App\lokasi_rambu;
use App\pejabat_struktural;
Use File;
use IDCrypt;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class rambuController extends Controller
{

    public function jenis_rambu_index(){

        $jenis_rambu= jenis_rambu::all();
        return view('jenis_rambu.index',compact('jenis_rambu'));
    }

    public function jenis_rambu_add(Request $request){

      //  dd($request);
        $this->validate(request(),[
            'nama_jenis'=>'required|unique:jenis_rambu'
          ]);
          $jenis_rambu = new jenis_rambu;
          $jenis_rambu->nama_jenis= $request->nama_jenis;
          $jenis_rambu->save();

          return redirect(route('jenis_rambu_index'))->with('success', 'Data Jenis rambu '.$request->nama_jenis.' Berhasil di Simpan');
    }

    public function jenis_rambu_detail($id){
        $id = IDCrypt::Decrypt($id);
        $jenis_rambu= jenis_rambu::findOrFail($id);
        $rambu = rambu::where('jenis_rambu_id', $id)->get();
        //dd($rambu);
        return view('jenis_rambu.detail',compact('rambu','jenis_rambu'));
    }

    public function jenis_rambu_detail_cetak($id){
        //ßdd('sukses');
        $id = IDCrypt::Decrypt($id);
        $jenis_rambu= jenis_rambu::findOrFail($id);
        $rambu = rambu::where('jenis_rambu_id', $id)->get();
        $pejabat_struktural = pejabat_struktural::where('jabatan','KASI REKSA')->first();
        //dd($pejabat_struktural->jabatan);
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.jenis_rambu_detail', ['pejabat_struktural'=>$pejabat_struktural,'rambu' => $rambu,'jenis_rambu'=>$jenis_rambu,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data per-rambu.pdf');
        //dd($rambu);
    }

    public function jenis_rambu_edit($id){
        $id = IDCrypt::Decrypt($id);
        $jenis_rambu = jenis_rambu::findOrFail($id);
        return view('jenis_rambu.edit',compact('jenis_rambu'));
    }


    public function jenis_rambu_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $jenis_rambu = jenis_rambu::findOrFail($id);
        $this->validate(request(),[
           'nama_jenis'=>'required'
       ]);
       $jenis_rambu->nama_jenis= $request->nama_jenis;
       $jenis_rambu->update();
       return redirect(route('jenis_rambu_index'))->with('success', 'Data Jenis rambu '.$request->nama_jenis.' Berhasil di Ubah');
      }//fungsi mengubah data jenis rambu

      public function jenis_rambu_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $jenis_rambu=jenis_rambu::findOrFail($id);
        $jenis_rambu->rambu()->delete();
        $jenis_rambu->delete();
        return redirect(route('jenis_rambu_index'))->with('success', 'Data Jenis rambu  Berhasil di hapus');
    } //menghapus  data jenis rambu

    public function rambu_index(){

        $jenis_rambu= jenis_rambu::all();
        $rambu= rambu::all();
        return view('rambu.index',compact('jenis_rambu','rambu'));
    }

    public function rambu_add(Request $request){
       // dd($request);
        $this->validate(request(),[
            'kode_rambu'=>'required|unique:rambu',
            'nama_rambu'=>'required|unique:rambu',
            'jenis_id'=>'required',
            'gambar'=>'required'
        ]);
        $rambu = new rambu;
        $FotoExt  = $request->gambar->getClientOriginalExtension();
        $FotoName = $request->kode_rambu.' - '.$request->nama_rambu;
        $gambar     = $FotoName.'.'.$FotoExt;
        $request->gambar->move('images/rambu', $gambar);

        $rambu->kode_rambu= $request->kode_rambu;
        $rambu->nama_rambu= $request->nama_rambu;
        $rambu->jenis_rambu_id= $request->jenis_id;
        $rambu->keterangan= $request->keterangan;
        $rambu->gambar            = $gambar;
        $rambu->save();

          return redirect(route('rambu_index'))->with('success', 'Data rambu '.$request->nama_rambu.' Berhasil di Tambahkan');
      }//fungsi menambahkan data rambu

      public function rambu_edit($id){
        $id = IDCrypt::Decrypt($id);
        $rambu = rambu::findOrFail($id);
        $jenis_rambu= jenis_rambu::all();

        return view('rambu.edit',compact('rambu','jenis_rambu'));
       }//fungsi menampilkan Halaman Edit data rambu

      public function rambu_detail($id){
        $id = IDCrypt::Decrypt($id);
        $rambu = rambu::findOrFail($id);
        $lokasi_rambu = lokasi_rambu::where('rambu_id',$id)->get();
        return view('rambu.detail',compact('rambu','lokasi_rambu'));
       }//fungsi menampilkan Halaman detail data rambu

       public function rambu_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
         $rambu = rambu::findOrFail($id);
         $this->validate(request(),[
            'kode_rambu'=>'required',
            'nama_rambu'=>'required',
            'keterangan'=>'required'
        ]);
        $rambu->kode_rambu= $request->kode_rambu;
        $rambu->nama_rambu= $request->nama_rambu;
        $rambu->keterangan= $request->keterangan;
        $rambu->update();
        return redirect(route('rambu_index'))->with('success', 'Data Rambu '.$request->nama_rambu.' Berhasil di ubah');
       }//fungi mengubah data rambu

       public function rambu_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $rambu=rambu::findOrFail($id);
        File::delete('images/rambu/'.$rambu->gambar);
       // $rambu->lokasi_rambu()->delete();
        $rambu->delete();

        return redirect(route('rambu_index'));
    }//fungsi menghapus data rambu

    public function rambu_keseluruhan_cetak(){
        $rambu =rambu::all();
    // $pejabat_struktural =pejabat_struktural::where('jabatan','kasi reksa')->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat_struktural = pejabat_struktural::where('jabatan','KASI REKSA')->first();
        $pdf =PDF::loadView('laporan.rambu_keseluruhan', ['rambu' => $rambu,'tgl'=>$tgl,'pejabat_struktural' => $pejabat_struktural]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan rambu Keseluruhan.pdf');
    }//fungsi membuat laporan rambu  pdf

    public function rambu_detail_cetak($id){
        $id = IDCrypt::Decrypt($id);
        $rambu =rambu::findOrFail($id);
        $lokasi_rambu = lokasi_rambu::where('rambu_id', $id)->get();
        $pejabat_struktural = pejabat_struktural::where('jabatan','KASI REKSA')->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.rambu_detail', ['rambu' => $rambu,'lokasi_rambu'=>$lokasi_rambu,'tgl'=>$tgl,'pejabat_struktural' => $pejabat_struktural]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data per-rambu.pdf');
    }//fungsi membuat laporan rambu detail pdf

}
