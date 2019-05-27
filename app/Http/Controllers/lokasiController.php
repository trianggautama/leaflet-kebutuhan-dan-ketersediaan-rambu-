<?php
namespace App\Http\Controllers;
use App\kecamatan;
use App\kelurahan;
use App\rambu;
use App\lokasi_rambu;
use App\kebutuhan_rambu;
use App\ketersediaan_rambu;
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
            $FotoName = 'lokasi - '.$request->kelurahan_id.' - '. $request->latitude;
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
    }

      //fungi  ketersediaan rambu
      public function lokasi_ketersediaan_index(){

        $lokasi_ketersediaan=lokasi_rambu::where('status',2)->get();

        return (view('titik_lokasi.lokasi_ketersediaan_rambu',compact('lokasi_ketersediaan')));
    }

    public function lokasi_ketersediaan_tambah(){

        $rambu = rambu::all();
        $kelurahan = kelurahan::all();

        return (view('titik_lokasi.lokasi_ketersediaan_rambu_tambah',compact('rambu','kelurahan')));
    }


}
