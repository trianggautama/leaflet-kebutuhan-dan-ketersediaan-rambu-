<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rambu extends Model
{
    protected $table ='rambu';

    protected $fillable = [
        'kode_rambu','nama_rambu','jenis_rambu_id','keterangan','gambar',
    ];

    public function jenis_rambu(){
        return $this->belongsTo('App\jenis_rambu');
      }
      public function lokasi_rambu(){
        return $this->hasMany('App\lokasi_rambu');
      }
}
