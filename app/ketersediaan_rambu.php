<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketersediaan_rambu extends Model
{
    
    protected $table ='ketersediaan_rambus';

    protected $fillable = [
        'lokasi_rambu_id','apbn','gambar','kondisi'
    ];

    public function lokasi_rambu(){
        return $this->belongsTo('App\lokasi_rambu');
      }
}
