<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kebutuhan_rambu extends Model
{
    protected $table ='kebutuhan_rambus';

    protected $fillable = [
        'lokasi_rambu_id','prioritas','gambar'
    ];

    public function lokasi_rambu(){
        return $this->hasMany('App\lokasi_rambu');
      }
}
