<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan_masyarakat extends Model
{
    protected $table ='laporan_masyarakats';

    protected $fillable = [
        'nama','no_hp','keterangan','gambar','longitude','latitude'
    ];

}
