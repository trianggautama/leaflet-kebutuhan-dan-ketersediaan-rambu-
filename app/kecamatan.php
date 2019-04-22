<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table ='kecamatan';

    protected $fillable = [
        'kode_rambu','nama_rambu',
    ];
    public function kelurahan(){
        return $this->hasMany('App\kelurahan');
      }
  
}
