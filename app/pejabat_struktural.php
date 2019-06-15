<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pejabat_struktural extends Model
{
    
    protected $table ='pejabat_strukturals';

    protected $fillable = [
        'nip','nama_pejabat','pangkat','jabatan'
    ];


}
