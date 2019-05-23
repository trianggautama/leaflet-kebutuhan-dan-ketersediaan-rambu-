<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi_rambu extends Model
{
    protected $table ='lokasi_rambus';

    protected $fillable = [
        'kelurahan_id','rambu_id','longitude','latitude','alamat','status'
    ];

    public function rambu(){
      return $this->hasOne('App\rambu');
    }
    public function kelurahan(){
      return $this->hasOne('App\kelurahan');
    }
    public function kebutuhan_rambu(){
        return $this->hasMany('App\kebutuhan_rambu');
    }

    public function ketersediaan_rambu(){
        return $this->hasMany('App\ketersediaan_rambu');
    }
}
