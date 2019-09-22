<?php

namespace App\Http\Controllers;
use App\laporan_masyarakat;
Use App\User;
Use App\biodata;
Use File;
use IDCrypt;
use Carbon\Carbon;
use PDF;
use App\pejabat_struktural;
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

    public function laporan_masyarakat_keseluruhan_cetak(){
        //dd('tes');
        $laporan_masyarakat = laporan_masyarakat::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat_struktural = pejabat_struktural::where('jabatan','KASI REKSA')->first();
        $pdf =PDF::loadView('laporan.laporan_masyarakat_keseluruhan', ['laporan_masyarakat'=>$laporan_masyarakat,'tgl'=>$tgl,'pejabat_struktural'=>$pejabat_struktural]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->download('Laporan Masyarakat Keseluruhan.pdf');
      }//cetak laporan kebutuhan rambu keseluruhan
  
      public function user_index(){
        $User = User::all();
        return view('user.index',compact('User'));
      }

      public function biodata_index(){
        $biodata = biodata::all();
        return view('user.biodata',compact('biodata'));
      }
      public function biodata_store(Request $request){
        $this->validate(request(),[
          'nama'=>'required|unique:biodatas',
          'jk'=>'required',
          'tempat_lahir'=>'required',
          'tanggal_lahir'=>'required',
          'status'=>'required'

        ]);
       // dd($request);
        $biodata                  = new biodata;
        $biodata->nama  = $request->nama;
        $biodata->jk  = $request->jk;
        $biodata->tempat_lahir    = $request->tempat_lahir;
        $biodata->tanggal_lahir    = $request->tanggal_lahir;
        $biodata->status    = $request->status;

        $biodata->save();
        return redirect(route('biodata_index'))->with('success', 'Data '.$request->nama.' Berhasil di Simpan');
      }

      public function biodata_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $biodata=biodata::findOrFail($id);
        $biodata->delete();
        return redirect(route('biodata_index'))->with('success', 'Data  Berhasil di Hapus');
      } 

      public function biodata_edit($id){
        $id = IDCrypt::Decrypt($id);
        $biodata=biodata::findOrFail($id);
        return view('user.biodata_edit',compact('biodata'));
      }

      public function biodata_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $biodata=biodata::findOrFail($id);
        $this->validate(request(),[
            'nama'=>'required',
            'jk'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'status'=>'required'
          ]);

         // dd($request);
          $biodata->nama  = $request->nama;
          $biodata->jk  = $request->jk;
          $biodata->tempat_lahir    = $request->tempat_lahir;
          $biodata->tanggal_lahir    = $request->tanggal_lahir;
          $biodata->status    = $request->status;
          $biodata->update();

         return redirect(route('biodata_index'))->with('success', 'Data  Berhasil di Ubah');
        }

        public function biodata_cetak(){
            $biodata =biodata::all();
        // $pejabat_struktural =pejabat_struktural::where('jabatan','kasi reksa')->get();
            $tgl= Carbon::now()->format('d-m-Y');
            $pejabat_struktural = pejabat_struktural::where('jabatan','KASI REKSA')->first();
            $pdf =PDF::loadView('laporan.biodata', ['biodata' => $biodata,'tgl'=>$tgl,'pejabat_struktural' => $pejabat_struktural]);
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream('biodata.pdf');
        }//fungsi membuat laporan rambu  pdf
}
