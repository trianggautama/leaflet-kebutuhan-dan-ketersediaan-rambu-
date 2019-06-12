<?php
namespace App\Http\Controllers;
Use File;
use App\kecamatan;
use App\kelurahan;
use App\rambu;
use App\lokasi_rambu;
use App\kebutuhan_rambu;
use App\ketersediaan_rambu;
use Carbon\Carbon;
use PDF;
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

              return redirect(route('kecamatan_index'))->with('success', 'Data Kecamatan '.$request->nama_kecamatan.' Berhasil di Simpan');
      }

      public function kecamatan_delete($id){
            $id = IDCrypt::Decrypt($id);
            $kecamatan=kecamatan::findOrFail($id);
            $kecamatan->delete();
            return redirect(route('kecamatan_index'));
    } //menghapus  data kecamatan



        //funsi kelurahan
        public function kelurahan_index(){

          $kelurahan = kelurahan::all();
          $kecamatan = kecamatan::all();

          return (view('kelurahan.index',compact('kelurahan','kecamatan')));
      }

      public function kelurahan_add(Request $request){

           // dd($request);
            $this->validate(request(),[
                'kode_kelurahan'=>'required|unique:kelurahan',
                'nama_kelurahan'=>'required',
                'kecamatan_id'=>'required'

              ]);
              $kelurahan = new kelurahan;
              $kelurahan->kode_kelurahan= $request->kode_kelurahan;
              $kelurahan->nama_kelurahan= $request->nama_kelurahan;
              $kelurahan->kecamatan_id= $request->kecamatan_id;
              $kelurahan->save();

                return redirect(route('kelurahan_index'))->with('success', 'Data '.$request->nama_kelurahan.' Berhasil di Simpan');
        }

        public function kelurahan_edit($id){
            $id = IDCrypt::Decrypt($id);
            $kelurahan=kelurahan::findOrFail($id);
            $kecamatan= kecamatan::all();
            return (view('kelurahan.edit',compact('kelurahan','kecamatan')));
        } //menghapus  data kecamatan

        public function kelurahan_update( Request $request ,$id){

            $id = IDCrypt::Decrypt($id);
            $kelurahan = kelurahan::findOrFail($id);
           // dd($request);
             $this->validate(request(),[
                 'kode_kelurahan'=>'required',
                 'nama_kelurahan'=>'required',
                 'kecamatan_id'=>'required'
               ]);
               $kelurahan->kode_kelurahan= $request->kode_kelurahan;
               $kelurahan->nama_kelurahan= $request->nama_kelurahan;
               $kelurahan->kecamatan_id= $request->kecamatan_id;
               $kelurahan->update();

                 return redirect(route('kelurahan_index'))->with('success', 'Data '.$request->nama_kelurahan.' Berhasil di Ubah');
         }

        public function kelurahan_delete($id){
              $id = IDCrypt::Decrypt($id);
              $kelurahan=kelurahan::findOrFail($id);
              $kelurahan->delete();
              return redirect(route('kelurahan_index'));
      } //menghapus  data kecamatan

         //funsi kebutuhan rambu
         public function lokasi_kebutuhan_index(){

          $lokasi_rambu=lokasi_rambu::where('status',2)->get();
         // dd($lokasi_kebutuhan);
          return (view('titik_lokasi.lokasi_kebutuhan_rambu',compact('lokasi_rambu')));
      }

      public function lokasi_kebutuhan_tambah(){

        $rambu = rambu::all();
        $kelurahan = kelurahan::all();

        return (view('titik_lokasi.lokasi_kebutuhan_rambu_tambah',compact('rambu','kelurahan')));
    }

    public function lokasi_kebutuhan_store(Request $request){
       // dd($request);
        $this->validate(request(),[
            'kelurahan_id'=>'required',
            'rambu_id'=>'required',
            'alamat'=>'required',
            'gambar'=>'required',
            'latitude'=>'required|unique:lokasi_rambus',
            'longitude'=>'required|unique:lokasi_rambus',
          ]);

          $lokasi_rambu = new lokasi_rambu;
          $lokasi_rambu->kelurahan_id= $request->kelurahan_id;
          $lokasi_rambu->rambu_id= $request->rambu_id;
          $lokasi_rambu->alamat= $request->alamat;
          $lokasi_rambu->latitude= $request->latitude;
          $lokasi_rambu->longitude= $request->longitude;
          $lokasi_rambu->status= $request->status;
          $lokasi_rambu->save();

          $kebutuhan_rambu = new kebutuhan_rambu;
          $kebutuhan_rambu->lokasi_rambu_id= $lokasi_rambu->id;
          $kebutuhan_rambu->prioritas= $request->prioritas;

          if ($request->gambar) {
            $FotoExt  = $request->gambar->getClientOriginalExtension();
            $FotoName = 'lokasi-'.$request->kelurahan_id.'-'. $request->latitude;
            $gambar     = $FotoName.'.'.$FotoExt;
            $request->gambar->move('images/kebutuhan_rambu', $gambar);
            $kebutuhan_rambu->gambar= $gambar;
        }else {
            $kebutuhan_rambu->gambar = 'default.png';
          }
          $kebutuhan_rambu->save();

            return redirect(route('lokasi_kebutuhan_index'))->with('success', 'Data Kebutuhan Rambu Berhasil di Tambahkan');
    }//menambah data kebutuhan rambu

    public function lokasi_kebutuhan_detail($id){
        $id = IDCrypt::Decrypt($id);
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
        return (view('titik_lokasi.lokasi_kebutuhan_rambu_detail',compact('lokasi_rambu')));
    }//menampilkan halaman detail kebutuhan rambu

    public function lokasi_kebutuhan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $rambu = rambu::all();
        $kelurahan = kelurahan::all();
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
        return (view('titik_lokasi.lokasi_kebutuhan_rambu_edit',compact('lokasi_rambu','kelurahan','rambu')));
     }//fungsimenampilkan halaman edit lokasi ketersediaan rambu

     public function lokasi_kebutuhan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
         $this->validate(request(),[
            'kelurahan_id'=>'required',
            'rambu_id'=>'required',
            'alamat'=>'required',
            'prioritas'=>'required',
          ]);
          $lokasi_rambu->kelurahan_id= $request->kelurahan_id;
          $lokasi_rambu->rambu_id= $request->rambu_id;
          $lokasi_rambu->alamat= $request->alamat;
          $lokasi_rambu->update();

          $kebutuhan_rambu = kebutuhan_rambu::where ('lokasi_rambu_id',$id)->first();
          $kebutuhan_rambu->prioritas= $request->prioritas;
          $kebutuhan_rambu->update();

        return redirect(route('lokasi_kebutuhan_index'))->with('success', 'Data Berhasil di ubah');
       }//fungi mengubah ketersediaan rambu

    public function lokasi_kebutuhan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
        //dd($lokasi_rambu->kebutuhan_rambu->gambar);
        $gambar = $lokasi_rambu->kebutuhan_rambu->gambar;
        //  dd($gambar);
        File::delete('images/kebutuhan_rambu/'.$gambar);
         $lokasi_rambu->kebutuhan_rambu->delete();
         $lokasi_rambu->delete();
         return redirect(route('lokasi_kebutuhan_index'));
    }

      //fungi  ketersediaan rambu
      public function lokasi_ketersediaan_index(){

        $lokasi_ketersediaan=lokasi_rambu::where('status',1)->get();

        return (view('titik_lokasi.lokasi_ketersediaan_rambu',compact('lokasi_ketersediaan')));
    }

    public function lokasi_ketersediaan_tambah(){
        $tgl= Carbon::now()->format('Y');
        $rambu = rambu::all();
        $kelurahan = kelurahan::all();

        return (view('titik_lokasi.lokasi_ketersediaan_rambu_tambah',compact('rambu','kelurahan','tgl')));
    }//menampilkan halman tambah data ketersediaan rambu


    public function lokasi_ketersediaan_store(Request $request){
      // dd($request);
       $this->validate(request(),[
           'kelurahan_id'=>'required',
           'rambu_id'=>'required',
           'alamat'=>'required',
           'latitude'=>'required|unique:lokasi_rambus',
           'longitude'=>'required|unique:lokasi_rambus',
         ]);

         $lokasi_rambu = new lokasi_rambu;
         $lokasi_rambu->kelurahan_id= $request->kelurahan_id;
         $lokasi_rambu->rambu_id= $request->rambu_id;
         $lokasi_rambu->alamat= $request->alamat;
         $lokasi_rambu->latitude= $request->latitude;
         $lokasi_rambu->longitude= $request->longitude;
         $lokasi_rambu->status= $request->status;
         $lokasi_rambu->save();

         $ketersediaan_rambu = new ketersediaan_rambu;
         $ketersediaan_rambu->lokasi_rambu_id= $lokasi_rambu->id;
         $ketersediaan_rambu->apbn= $request->apbn;
         $ketersediaan_rambu->kondisi= $request->kondisi;

         if ($request->gambar) {
           $FotoExt  = $request->gambar->getClientOriginalExtension();
           $FotoName = 'lokasi - '.$request->kelurahan_id.' - '. $request->latitude;
           $gambar     = $FotoName.'.'.$FotoExt;
           $request->gambar->move('images/ketersediaan_rambu', $gambar);
           $ketersediaan_rambu->gambar= $gambar;
       }else {
           $ketersediaan_rambu->gambar = 'default.png';
         }
         $ketersediaan_rambu->save();

           return redirect(route('lokasi_ketersediaan_index'))->with('success', 'Data Kebutuhan Rambu Berhasil di Tambahkan');
        }//menambah data kebutuhan rambu

        public function lokasi_ketersediaan_detail($id){
          $id = IDCrypt::Decrypt($id);
          $lokasi_rambu=lokasi_rambu::findOrFail($id);
          return (view('titik_lokasi.lokasi_ketersediaan_rambu_detail',compact('lokasi_rambu')));
       }//fungsi detail lokasi ketersediaan rambu

       public function lokasi_ketersediaan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $rambu = rambu::all();
        $kelurahan = kelurahan::all();
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
        return (view('titik_lokasi.lokasi_ketersediaan_rambu_edit',compact('lokasi_rambu','kelurahan','rambu')));
     }//fungsimenampilkan halaman edit lokasi ketersediaan rambu

     public function lokasi_ketersediaan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
         $this->validate(request(),[
            'kelurahan_id'=>'required',
            'rambu_id'=>'required',
            'alamat'=>'required',
            'apbn'=>'required',
          ]);
          $lokasi_rambu->kelurahan_id= $request->kelurahan_id;
          $lokasi_rambu->rambu_id= $request->rambu_id;
          $lokasi_rambu->alamat= $request->alamat;
          $lokasi_rambu->update();

          $ketersediaan_rambu = ketersediaan_rambu::where ('lokasi_rambu_id',$id)->first();
          $ketersediaan_rambu->apbn= $request->apbn;
          $ketersediaan_rambu->kondisi= $request->kondisi;

          $ketersediaan_rambu->update();

        return redirect(route('lokasi_ketersediaan_index'))->with('success', 'Data Berhasil di ubah');
       }//fungi mengubah ketersediaan rambu

       public function lokasi_ketersediaan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $lokasi_rambu=lokasi_rambu::findOrFail($id);
        //dd($lokasi_rambu->kebutuhan_rambu->gambar);
        $gambar = $lokasi_rambu->ketersediaan_rambu->gambar;
        //  dd($gambar);
        File::delete('images/ketersediaan_rambu/'.$gambar);
         $lokasi_rambu->ketersediaan_rambu->delete();
         $lokasi_rambu->delete();
         return redirect(route('lokasi_ketersediaan_index'));
    }

    public function lokasi_kebutuhan_keseluruhan_cetak(){
      //dd('tes');
      $lokasi_rambu = lokasi_rambu::where('status', 2)->get();
      $tgl= Carbon::now()->format('d-m-Y');
      $pdf =PDF::loadView('laporan.kebutuhan_rambu_keseluruhan', ['lokasi_rambu'=>$lokasi_rambu,'tgl'=>$tgl]);
      $pdf->setPaper('a4', 'potrait');
      return $pdf->download('Laporan data kebutuhan rambu keseluruhan.pdf');
    }


}
