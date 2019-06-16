<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi_rambu extends Model
{
    protected $table ='lokasi_rambus';

    protected $fillable = [
        'kelurahan_id','rambu_id','longitude','latitude','alamat','status'
    ];

    public $appends = [
      'coordinate', 'map_popup_content',
  ];
   /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'alamat' => $this->alamat, 'type' => __('lokasi_rambu.lokasi_rambu'),
        ]);
        $link = '<a href="'.route('lokasi_ketersediaan_detail', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->alamat;
        $link .= '</a>';
        return $link;
    }
 
    /**
     * Get outlet coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }
    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('lokasi_irambu.alamat').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';
        return $mapPopupContent;
    }

     //fungsi relasi
     public function rambu(){
      return $this->belongsTo('App\rambu');
    }
    public function kelurahan(){
      return $this->belongsTo('App\kelurahan');
    }
    public function kebutuhan_rambu(){
        return $this->hasOne('App\kebutuhan_rambu');
    }
    public function ketersediaan_rambu(){
        return $this->hasOne('App\ketersediaan_rambu');
    }

}

 