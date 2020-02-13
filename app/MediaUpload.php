<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaUpload extends Model
{

    protected $fillable = ['name','year_id','place_id','date','caption','alt','metadata'];


    public function place(){
        return $this->belongsTo ('App\Place');
    }

    public function year(){
        return $this->belongsTo ('App\Year');
    }
}
